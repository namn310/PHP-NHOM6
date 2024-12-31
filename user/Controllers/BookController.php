<?php
include "user/Model/BookModel.php";
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class BookController extends Controller
{
    use BookModel;
    //load view trang đặt lịch
    public function index()
    {
        if (isset($_COOKIE["tokenLogin"])) {
            $getKey = new Controller();
            $key = $getKey->getKey();
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
        } else {
            $idUser = 0;
        }
        $this->loadView("../user/Views/booking.php", ['idUser' => $idUser]);
    }
    //tạo lịch hẹn
    public function create()
    {
        if (!isset($_COOKIE['tokenLogin'])) {
            $this->loadView("../user/Views/login.php");
        } else {
            try {
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $this->createBook($id);
            } catch (Throwable) {
                setcookie("createBookingError", "1", time() + 3);
                header("location:index.php?controller=book");
            }
            setcookie("createBookingSuccess", "1", time() + 3);
            header("location:index.php?controller=book");
        }
    }
    //load đến trang thay đổi lịch 
   
    // thay đổi lịch hẹn
    public function changePost()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->changeBooking($id);
        // echo ('<script>confirm("Thay đổi lịch thành công")</script>');
        // header("location:index.php?controller=cart");
    }
    //xóa bỏ lịch hẹn
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $this->deleteBooking($id);
        echo ('<script>confirm("xóa lịch thành công")</script>');
        header("location:index.php?controller=cart");
    }
    public function BookHistory()
    {
        $this->loadView("../user/Views/lich_hen.php");
    }
}
