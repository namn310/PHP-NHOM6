<?php
include "user/Model/UserModel.php";
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends Controller
{
    use UserModel;
    public function index()
    {
        $controller = new Controller();
        $key = $controller->getKey();
        if ($controller->authentication() == true) {
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
            $this->loadView("../user/Views/inforUser.php", ['idUser' => $idUser]);
        } else {
            $this->loadView("../user/Views/login.php");
        }
    }
    public function changepass()
    {
        $controller = new Controller();
        $key = $controller->getKey();
        if ($controller->authentication() == true) {
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
            $conn = Connection::getInstance();
            $query = $conn->prepare("select name from customers where id=:id");
            $query->execute([':id' => $idUser]);
            foreach ($query->fetchAll() as $row) {
                $name = $row->name;
            }
            $this->loadView("../user/Views/changepass.php", ['idUser' => $idUser, 'name' => $name]);
        } else {
            $this->loadView("../user/Views/login.php");
        }
    }
    public function updatePass()
    {
        $controller = new Controller();
        $key = $controller->getKey();
        if ($controller->authentication() == true) {
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
            try {
                $this->updatePassword($idUser);
            } catch (Throwable) {
            }
        } else {
            $this->loadView("../user/Views/login.php");
        }
    }
    public function update()
    {
        $controller = new Controller();
        if ($controller->authentication() == true) {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $this->update($id);
            header("index.php?controller=user");
        } else {
            $this->loadView("../user/Views/login.php");
        }
    }
}
