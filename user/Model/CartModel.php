<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

include("../Project-petcare-php/user/Controllers/ProductController.php");
trait CartModel
{
    public function cartAdd($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            //nếu đã có sp trong giỏ hàng thì số lượng lên 1
            $_SESSION['cart'][$id]['number']++;
        } else {
            $conn = Connection::getInstance();
            $query = $conn->query("select * from product where idPro=$id");
            $product = $query->fetch();
            // $a = new ProductController();
            $img = $this->getMainImage($id);
            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'name' => $product->namePro,
                'photo' => $img,
                'discount' => $product->discount,
                'number' => 1,
                'price' => $product->giaban,

            );
            // print_r($_SESSION())
        }
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
    //Cập nhật số lượng sản phẩm
    public function cartUpdate($id, $number)
    {
        if ($number == 0) {
            //xóa sp ra khỏi giỏ hàng
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['number'] = $number;
        }
    }

    public function cartDelete($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    //  Tổng giá trị giỏ hàng

    public function cartTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $product) {
            if ($product['discount'] !== '') {
                $total += $product['number'] * ($product['price'] - ($product['price'] * $product['discount']) / 100);
            } else $total += $product['number'] * $product['price'];
        }
        return $total;
    }

    //  Số sản phẩm có trong giỏ hàng
    public function cartNumber()
    {
        if (isset($_SESSION['cart'])) {
            $number = 0;
            foreach ($_SESSION['cart'] as $product) {
                $number += $product['number'];
            }
            return $number;
        }
    }
    //  Dah sách sản phẩm trong giỏ hàng
    public function cartList()
    {
        return $_SESSION['cart'];
    }
    //checkout
    public function cartCheckOut()
    {
        $getKey = new Controller();
        $key = $getKey->getKey();
        if (isset($_COOKIE["tokenLogin"])) {
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $customer_id = $decoded->idUser;
            $payment = $_POST['payment'];
            $conn = Connection::getInstance();
            //lay id vua moi insert
            $query = $conn->prepare("insert into orders set customer_id=:customer_id, create_at=now(),payment=:payment");
            $query->execute(["customer_id" => $customer_id, "payment" => $payment]);
            //lay id vua moi insert
            $order_id = $conn->lastInsertId();
            //duyet cac ban ghi trong session array de insert vao orderdetails
            foreach ($_SESSION["cart"] as $product) {
                $id = $product["id"];
                $query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, number=:number");
                $query->execute([
                    "order_id" => $order_id,
                    "product_id" => $product["id"],
                    "price" => $product["price"],
                    "number" => $product["number"]
                ]);
                $query1 = $conn->query("select * from product where idPro = $id");
                //tra ve mot ban ghi
                $query1 = $query1->fetch();
                if ($product["number"] > 0) {
                    $count = $query1->count - $product["number"];
                    $conn->query("update product set count = $count where idPro = $id");
                }
            }
            //xoa gio hang
            unset($_SESSION["cart"]);
            return $order_id;
        } else {
            return false;
        }
    }
    public function modelListOrderDetails()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orderdetails where order_id = $id");
        //tra ve mot ban ghi
        return $query->fetchAll();
    }

    public function modelGetProducts($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where idPro = $id");
        return $query->fetch();
    }
}
