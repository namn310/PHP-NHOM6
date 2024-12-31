<?php
trait VoucherModel
{
    public function createVoucher()
    {
        $ma = $_POST['ma'];
        $count = $_POST['count'];
        $discount = $_POST['discount'];
        $OrderCon = $_POST['dk_hoadon'];
        $CountCon = $_POST['dk_soluong'];
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $des = $_POST['mota'];
        //so sánh thời gian
        $timeStartTimestamp = strtotime($dateStart);
        $timeEndTimestamp = strtotime($dateEnd);
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
        $conn = Connection::getInstance();
        $query = $conn->prepare("select id from vouchers where ma=:ma");
        $query->execute(['ma' => $ma]);
        if ($query->rowCount() > 0) {
            return false;
        } else {
            $query1 = $conn->prepare("insert into vouchers set ma=:ma,count=:count,dk_hoadon=:dk_hoadon,dk_soluong=:dk_soluong,discount=:discount,status=:status,description=:des,time_start=:time_start,time_end=:time_end,created_at=:time");
            $query1->execute([
                'ma' => $ma,
                'count' => $count,
                'dk_hoadon' => $OrderCon,
                'dk_soluong' => $CountCon,
                'discount' => $discount,
                'status' => $status,
                'des' => $des,
                'time_start' => $dateStart,
                'time_end' => $dateEnd,
                'time' => date('d-m-Y')
            ]);
            return true;
        }
    }
    public function modelRead($recordPerPage)
    {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        // lấy từ bản ghi nào
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM vouchers ORDER BY id DESC limit $from,$recordPerPage");
        $result = $query->fetchAll();
        return $result;
    }
    //tính tổng số bản ghi
    public function modelTotal()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from vouchers ");
        //rowCount() trả về số lượng row bị tác động;
        return $query->rowCount();
    }
    public function deleteVoucher($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from vouchers where id=:id");
        $query->execute(['id' => $id]);
    }
    public function updateVoucher($id)
    {
        $ma = $_POST['ma'];
        $count = $_POST['count'];
        $discount = $_POST['discount'];
        $OrderCon = $_POST['dk_hoadon'];
        $CountCon = $_POST['dk_soluong'];
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $des = $_POST['mota'];
        //so sánh thời gian
        $timeStartTimestamp = strtotime($dateStart);
        $timeEndTimestamp = strtotime($dateEnd);
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
        $conn = Connection::getInstance();
        $query = $conn->prepare("select id from vouchers where ma=:ma and not(id=:id)");
        $query->execute(['ma' => $ma, 'id' => $id]);
        if ($query->rowCount() > 0) {
            return 1;
        }
        try {
            $query1 = $conn->prepare("update vouchers set ma=:ma,count=:count,dk_hoadon=:dk_hoadon,dk_soluong=:dk_soluong,discount=:discount,status=:status,description=:des,time_start=:time_start,time_end=:time_end,created_at=:time where id=:id");
            $query1->execute([
                'ma' => $ma,
                'count' => $count,
                'dk_hoadon' => $OrderCon,
                'dk_soluong' => $CountCon,
                'discount' => $discount,
                'status' => $status,
                'des' => $des,
                'time_start' => $dateStart,
                'time_end' => $dateEnd,
                'time' => date('d-m-Y'),
                'id' => $id
            ]);
        } catch (Throwable) {
            return 2;
        }
        return 3;
    }
    public function updateStatusVoucher()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id,status,time_start,time_end from vouchers");
        //lấy thời gian hiện tại
        $todayTimestamp = strtotime(date('Y-m-d'));
        foreach ($query->fetchAll() as $row) {
            $timeStartTimestamp = strtotime($row->time_start);
            $timeEndTimestamp = strtotime($row->time_end);
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
            $query2 = $conn->prepare("update vouchers set status=:status where id=:id");
            $query2->execute(['status' => $status, 'id' => $row->id]);
        }
    }
}
