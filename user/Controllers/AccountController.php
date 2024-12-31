<?php
include "user/Model/AccountModel.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AccountController extends Controller
{
    use AccountModel;
    public function index()
    {
        $this->loadView("../user/Views/login.php");
    }
    public function Login()
    {
        $getKey = new Controller();
        $key = $getKey->getKey();
        try {
            $token = $this->LoginModel();
            if ($token > 0) {
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $timeExp = $decoded->exp;
                setcookie('tokenLogin', $token, [
                    'expires' => $timeExp,
                    // 'path' => '/',
                    // 'domain' => '', 
                    'secure' => true,  // Cookie chỉ được gửi qua HTTPS
                    'httponly' => true,  // Ngăn JavaScript truy cập cookie
                    'samesite' => 'Strict'
                ]);
                header("location:index.php");
            } else {
                setcookie("errorLogin", "Email hoặc mật khẩu không chính xác !", time() + 3);
                header("location:index.php?controller=account");
            }
        } catch (Throwable) {
        }
    }
    public function logOut()
    {
        if (isset($_COOKIE["tokenLogin"])) {
            $token = $_COOKIE["tokenLogin"];
            setcookie('tokenLogin', $token, [
                'expires' => time() - 10000,
                // 'path' => '/',
                // 'domain' => '', 
                'secure' => true,  // Cookie chỉ được gửi qua HTTPS
                'httponly' => true,  // Ngăn JavaScript truy cập cookie
                'samesite' => 'Strict'
            ]);
            unset($_SESSION["userId"]);
        }
        header("location:index.php?controller=home");
    }
}
