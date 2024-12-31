<?php
trait DichvuModel
{
    public function createDV()
    {
        $conn = Connection::getInstance();
        $nameDV = $_POST['nameDM'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time() . '_' . $hinhanh;
        $dateAdd = date("d-m-y");
        $query = $conn->prepare('INSERT INTO dichvu SET ten_dichvu=:nameDV,hinhanh=:hinhanh,dateCreate=:dateAdd');
        $query->execute([
            ':nameDV' => $nameDV,
            ':hinhanh' => $hinhanh,
            'dateAdd' => $dateAdd
        ]);
        move_uploaded_file($hinhanh_tmp, "../assets/img-dichvu/" . $hinhanh);
    }
    //lấy thông tin dịch vụ
    public function getDV()
    {
        $conn = Connection::getInstance();
        $result = $conn->query('select * from dichvu');
        return $result->fetchAll();
    }
    //lấy chi tiết dịch vụ
    public function getDetail($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from dichvu where id_dichvu=:id");
        $query->execute([':id' => $id]);
        return $query->fetchAll();
    }
    //sửa thông tin dịch vụ
    public function update($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        $updateproduct = $conn->prepare("update dichvu set ten_dichvu=:_name where id_dichvu=:_id");
        $updateproduct->execute([":_name" => $name, ":_id" => $id]);
        if ($_FILES['hinhanh']['name'] != "") {
            //lấy hình ảnh dịch vụ
            $oldImg = $conn->query("select hinhanh from dichvu where id_dichvu=$id");
            if ($oldImg->rowCount() > 0)
                $oldImgSelect = $oldImg->fetch();
            if (file_exists("assets/img-dichvu/" . $oldImgSelect->hinhanh))
                unlink("assets/img-dichvu/" . $oldImgSelect->hinhanh);
            //xử lý hình ảnh
            $hinhanh = time() . '_' . $_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
            move_uploaded_file($hinhanh_tmp, "../assets/img-dichvu/" . $hinhanh);
            $query = $conn->prepare("update dichvu set hinhanh=:_hinhanh where id_dichvu=:_id");
            $query->execute([":_hinhanh" => $hinhanh, ":_id" => $id]);
        }
    }
    //xóa dịch vụ
    public function deleteDV($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from dichvu where id_dichvu=:_id");
        $query->execute([':_id' => $id]);
    }
}
