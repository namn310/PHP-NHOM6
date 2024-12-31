<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use \Firebase\JWT\JWT;

trait AccountModel
{
    //đăng nhập
    public function LoginModel()
    {
        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password1 = md5($password);
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from customers where pass=:password and email=:email ");
        $query->execute(["email" => $email, "password" => $password1]);
        if ($query->rowCount() > 0) {
            //---
            $record = $query->fetch();
            //---
            $getKey = new Controller();
            $key = $getKey->getKey();
            $tokenLogin = [
                'iat' => time(),
                'exp' => time() + 3600,
                'idUser' => $record->id,
                'email' => $record->email,

            ];
            $jwt = JWT::encode($tokenLogin, $key, 'HS256');
            $_SESSION["userId"] = $record->id;
            //header("location:index.php");
            return $jwt;
        } else
            return 0;
    }
}
