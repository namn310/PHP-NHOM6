<?php
trait DiscountModel
{
    public function modelRead($recordPerPage)
    {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        // lấy từ bản ghi nào
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM discounts ORDER BY id DESC limit $from,$recordPerPage");
        $result = $query->fetchAll();
        return $result;
    }
    //tính tổng số bản ghi
    public function modelTotal()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from discounts ");
        //rowCount() trả về số lượng row bị tác động;
        return $query->rowCount();
    }
    public function getCategoryName($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select tendanhmuc from danhmuc where id_danhmuc=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->tendanhmuc;
        }
    }
    public function createDiscount()
    {
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        $discount = $_POST['discount'];
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $category = $_POST['category'];
        //so sánh thời gian
        $timeStartTimestamp = strtotime($dateStart);
        $timeEndTimestamp = strtotime($dateEnd);
        // Lấy timestamp của ngày hôm nay
        $todayTimestamp = strtotime(date('Y-m-d'));
        // Đặt status ban đầu
        // So sánh thời gian
        if ($timeStartTimestamp > $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
            $status = 2; // Nếu cả time_start và time_end đều lớn hơn ngày hôm nay
        } elseif ($timeStartTimestamp <= $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
            $status = 1;
        } else {
            $status = 0;
        }
        try {
            $query = $conn->prepare("insert into discounts set name=:name,discount=:discount,time_start=:start,time_end=:end,status=:status,idCat=:idCat,created_at=:create");
            $query->execute([
                'name' => $name,
                'discount' => $discount,
                'start' => $dateStart,
                'end' => $dateEnd,
                'status' => $status,
                'idCat' => $category,
                'create' => date('d-m-Y')
            ]);
            $id = $conn->lastInsertId();
            if ($status === 1) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                    $discountOf = $row->discount;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => $discountOf, 'id' => $idCat]);
            }
            if ($status === 0) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => '', 'id' => $idCat]);
            }
        } catch (Throwable) {
            return false;
        }
        return true;
    }
    public function destroy($id)
    {
        try {
            $conn = Connection::getInstance();
            $query = $conn->prepare("delete from discounts where id=:id");
            $query->execute(['id' => $id]);
            $query2 = $conn->prepare("select idCat from discounts where id=:id");
            $query2->execute(['id' => $id]);
            foreach ($query2->fetchAll() as $row) {
                $idCat = $row->idCat;
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute([
                    'discount' => '',
                    'id' => $idCat
                ]);
            }
        } catch (Throwable) {
            return false;
        }
        return true;
    }
    public function getDiscount($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from discounts where id=:id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }
    public function updateDiscount($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        $discount = $_POST['discount'];
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $category = $_POST['category'];
        //reset lai discount cua product
        $a = $conn->prepare("select idCat from discounts where id=:id");
        $a->execute(['id' => $id]);
        foreach ($a->fetchAll() as $row) {
            $cat = $row->idCat;
            $pro = $conn->prepare("update product set discount=:discount where idCat=:id");
            $pro->execute(['discount' => '', 'id' => $cat]);
        }
        //so sánh thời gian
        $timeStartTimestamp = strtotime($dateStart);
        $timeEndTimestamp = strtotime($dateEnd);
        // Lấy timestamp của ngày hôm nay
        $todayTimestamp = strtotime(date('Y-m-d'));
        // Đặt status ban đầu
        // So sánh thời gian
        if ($timeStartTimestamp > $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
            $status = 2;
            //Chương trình chưa diễn ra
        }
        // Nếu cả time_start và time_end đều lớn hơn ngày hôm nay
        elseif ($timeStartTimestamp <= $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
            $status = 1;
        } else {
            $status = 0;
        }
        try {
            $query = $conn->prepare("update discounts set name=:name,discount=:discount,time_start=:start,time_end=:end,status=:status,idCat=:idCat where id=:id");
            $query->execute([
                'name' => $name,
                'discount' => $discount,
                'start' => $dateStart,
                'end' => $dateEnd,
                'status' => $status,
                'idCat' => $category,
                'id' => $id
            ]);
            if ($status = 1) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                    $discountOf = $row->discount;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => $discountOf, 'id' => $idCat]);
            }
            if ($status = 0) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => '', 'id' => $idCat]);
            }
        } catch (Throwable) {
            return false;
        }
        return true;
    }
    public function updateStatusDiscount()
    {
        //so sánh thời gian
        $conn = Connection::getInstance();
        $query = $conn->query("select * from discounts");
        foreach ($query->fetchAll() as $row) {
            $timeStartTimestamp = strtotime($row->time_start);
            $timeEndTimestamp = strtotime($row->time_end);
            // Lấy timestamp của ngày hôm nay
            $todayTimestamp = strtotime(date('Y-m-d'));
            // Đặt status ban đầu
            $status = 0;
            // So sánh thời gian
            if ($timeStartTimestamp > $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
                $status = 2; // Nếu cả time_start và time_end đều lớn hơn ngày hôm nay
            } elseif ($timeStartTimestamp <= $todayTimestamp && $timeEndTimestamp > $todayTimestamp) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query2 = $conn->prepare("update discounts set status=:status where id=:id");
            $query2->execute(['status' => $status, 'id' => $row->id]);
        }
    }
    public function updateDiscountProduct()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id,status from discounts");
        foreach ($query->fetchAll() as $row) {
            if ($row->status == 1) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $row->id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                    $discountOf = $row->discount;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => $discountOf, 'id' => $idCat]);
            } elseif ($row->status == 0) {
                $query2 = $conn->prepare("select idCat,discount from discounts where id=:id");
                $query2->execute(['id' => $row->id]);
                foreach ($query2->fetchAll() as $row) {
                    $idCat = $row->idCat;
                }
                $query3 = $conn->prepare("update product set discount=:discount where idCat=:id");
                $query3->execute(['discount' => '', 'id' => $idCat]);
            }
        }
    }
}
