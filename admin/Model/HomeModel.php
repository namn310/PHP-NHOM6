<?php
trait HomeModel
{
    public function getOrder()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orders inner join orderdetails on  orders.id=orderdetails.order_id order by orders.id desc limit 7");
        return $query->fetchAll();
    }
    public function getCus($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select name,sodienthoai from customers where id=:id");
        $query->execute([':id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return ['name' => $row->name, 'phone' => $row->sodienthoai];
        }
    }
    public function getHotProduct()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where discount > 0 order by idPro desc limit 10");
        $product = $query->fetchAll();
        return $product;
    }
    public function ProductOutCount()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where count <=0");
        return $query->rowCount();
    }
    public function getOrderToday()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from orders where DATE(create_at)=CURDATE()");
        return $query->rowCount();
    }
    public function getCountCus()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from customers ");
        return $query->rowCount();
    }
    public function getDiscount($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select discount from product where id=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->discount;
        }
    }
    public function getSale()
    {
        $sales = 0;
        $conn = Connection::getInstance();
        $query = $conn->query("select orderdetails.price from orders inner join orderdetails on  orders.id=orderdetails.order_id where status >0");
        foreach ($query->fetchAll() as $row) {
           $sales+=$row->price;
        }
        return $sales;
    }
   
}
