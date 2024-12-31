<?php
trait ProductModel
{
    public function modelRead()
    {
        $conn = Connection::getInstance();
        $query2 = $conn->query("select id_danhmuc from danhmuc limit 1");
        foreach ($query2->fetchAll() as $row) {
            $id = $row->id_danhmuc;
        };
        $id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : $id;
        $query = $conn->prepare("select * from product where idCat=:id");
        $query->execute(['id' => $id_danhmuc]);
        $result = $query->fetchAll();
        return $result;
        // print_r($result);
    }
    public function getDanhMuc($id_danhmuc)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select tendanhmuc from danhmuc where id_danhmuc = $id_danhmuc");
        foreach ($query->fetchAll() as $result)
            return $result->tendanhmuc;
    }
    public function modelGetRecord($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where idPro=$id");
        return $query->fetchAll();
    }
    public function modelComment($idPro, $idCus)
    {
        $comment = $_POST['comment'];
        $timeCreate = date('d-m-y');
        $conn = Connection::getInstance();
        $query = $conn->prepare("insert into comment set noidung=:_noidung,timeCreate=:_timeAdd,id_product=:_idPro,id_user=:_id_Cus");
        $query->execute([':_noidung' => $comment, ':_idPro' => $idPro, ':_id_Cus' => $idCus, ':_timeAdd' => $timeCreate]);
    }
    public function getComment($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from comment where id_product=:id");
        $query->execute([':id' => $id]);
        return $query->fetchAll();
    }
    public function getMainImage($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select image from image_products where idPro=:id limit 1");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->image;
        }
    }
    public function getAllImg($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select image from image_products where idPro=:id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }
    public function getProductRelated($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select idCat from product where idPro=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            $idCat = $row->idCat;
        }
        $query2 = $conn->prepare("select * from product where idCat=:id");
        $query2->execute(['id' => $idCat]);
        return $query2->fetchAll();
    }
    public function getNameUser($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select name from customers where id=:id ");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->name;
        }
    }
}
