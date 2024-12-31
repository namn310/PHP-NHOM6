<?php
include "Model/DanhmucModel.php";
class DanhmucController extends Controller
{
    use DanhmucModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $data = $this->modelRead();
            $this->loadView("quanlydanhmuc.php", ["data" => $data]);
        }
    }
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            if (!isset($_SESSION['admin_email'])) {
                $this->loadView("pages-login.php");
            } else {
                $this->loadView("Adddanhmuc.php");
            }
        }
    }
    public function createPost()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            try {
                $this->modelCreate();
            } catch (Throwable) {
                setcookie("createCatError", "1", time() + 3);
                header("Location:index.php?controller=danhmuc");
            }
            setcookie("createCatSuccess", "1", time() + 3);
            header("Location:index.php?controller=danhmuc");
        }
    }
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
            try {
                $this->modelDelete($id);
            } catch (Throwable) {
                setcookie("deleteCatError", "1", time() + 3);
                header("Location:index.php?controller=danhmuc");
            }
            setcookie("deleteCatSuccess", "1", time() + 3);
            header("Location:index.php?controller=danhmuc");
        }
    }
    public function update()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
            try {
                $this->updatePost($id);
            } catch (Throwable) {
                setcookie("updateCatError", "1", time() + 3);
                header("Location:index.php?controller=danhmuc");
            }
            setcookie("updateCatSuccess", "1", time() + 3);
            header("Location:index.php?controller=danhmuc");
        }
    }
}
