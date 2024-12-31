<?php

trait DanhmucModel
{
    public function modelRead()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from danhmuc order by id_danhmuc ");
        $result = $query->fetchAll();
        return $result;
    }
    public function modelTotal()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from danhmuc");
        return $query->rowCount();
    }
    public function modelCreate()
    {
        $conn = Connection::getInstance();
        $name = $_POST['nameDM'];
        $dateAdd = date('d-m-y');
        $query = $conn->prepare("INSERT INTO danhmuc set tendanhmuc=:_danhmuc,dateadd=:_date");
        $query->execute([":_danhmuc" => $name, ":_date" => $dateAdd]);
    }
    public function modelDelete($id)
    {
        $conn = Connection::getInstance();
        $conn->query("DELETE from danhmuc where id_danhmuc=$id");
    }
    public function updatePost($id)
    {
        $name = $_POST['tendanhmuc'];
        $conn = Connection::getInstance();
        $query = $conn->prepare("update danhmuc set tendanhmuc=:name where id_danhmuc=:id");
        $query->execute(['name' => $name, 'id' => $id]);
    }
}
