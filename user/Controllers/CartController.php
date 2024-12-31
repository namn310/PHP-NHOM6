<?php
include "user/Model/CartModel.php";
require 'vendor/autoload.php';
include "user/Controllers/UserController.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CartController extends Controller
{
    use CartModel;
    //hàm tạo giỏ hàng

    public function __construct()
    {
        if (isset($_SESSION["cart"]) == false)
            $_SESSION["cart"] = array();
    }
    public function create()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $this->cartAdd($id);
        header("location:index.php?controller=cart");
    }
    //hiển thị giỏ hàng
    public function index()
    {
        $getKey = new Controller();
        $key = $getKey->getKey();
        if (isset($_COOKIE["tokenLogin"])) {
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
            $User = new UserController();
            $name = $User->getUser($idUser)['name'];
            $phone = $User->getUser($idUser)['phone'];
            $this->loadView("../user/Views/cart.php", ['name' => $name, 'phone' => $phone]);
        } else
            $this->loadView("../user/Views/cart.php");
    }
    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        try {
            $this->cartDelete($id);
        } catch (Throwable) {
            header("location:index.php?controller=cart");
        }
        header("location:index.php?controller=cart");
    }
    public function update()
    {
        //duyet cac phan tu trong session array
        foreach ($_SESSION["cart"] as $product) {
            $id = $product["id"];
            $quantity = $_POST["product_$id"];
            //goi ham cartUpdate de update lai so luong
            $this->cartUpdate($id, $quantity);
        }
        header("location:index.php?controller=cart");
    }
    public function checkout()
    {
        //kiem tra neu user chua dang nhap thi di chuyen den trang dang nhap
        if (isset($_COOKIE["tokenLogin"]) == false)
            header("location:index.php?controller=account&action=login");
        else {
            if ($this->cartCheckOut() !== false) {
                setcookie("successCart", "Thanh toán thành công ! Vui lòng kiểm tra lại đơn hàng trong giỏ hàng", time() + 3);
                header("location:index.php?controller=cart");
            } else {
                setcookie("errorCart", "Thanh toán không thành công ! Vui lòng thử lại sau ", time() + 3);
                header("location:index.php?controller=account");
            }
        }
    }
    public function CartHistory()
    {
        $this->loadView("../user/Views/don_hang.php");
    }
}
