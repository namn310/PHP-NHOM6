<?php
trait HomeModel
{
    public function ModelHotProduct()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where not discount= ' '");
        $results = $query->fetchAll();
        return $results;
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
}
