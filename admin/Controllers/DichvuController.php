<?php
include "Model/DichvuModel.php";
class DichvuController extends Controller
{

    use DichvuModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $data = $this->getDV();
            $this->loadView("Quanlydichvu.php", ['data' => $data]);
        }
    }
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Adddichvu.php");
        }
    }
    public function createPost()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->createDV();
            header("Location:index.php?controller=dichvu");
        }
    }
    //xem chi tiết dịch vụ
    public function detail()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $data = $this->getDetail($id);
            $this->loadView('DichvuDetail.php', ['data' => $data]);
        }
    }
    public function change()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $data = $this->getDetail($id);
            $this->loadView('ChangeDichvu.php', ['data' => $data]);
        }
    }
    public function changePost()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            try {
                $this->update($id);
            } catch (Throwable) {
                header("Location:index.php?controller=dichvu");
                setcookie("changeServiceError", "1", time() + 2);
            }
            setcookie("changeServiceSuccess", "1", time() + 2);
            header("Location:index.php?controller=dichvu");
        }
    }
    // xóa dịch vụ
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            header("Location:index.php?controller=dichvu");
            try {
                $this->deleteDV($id);
            } catch (Throwable) {
                setcookie("deleteServiceError", "1", time() + 2);
                header("Location:index.php?controller=dichvu");
            }
            setcookie("deleteServiceSuccess", "1", time() + 2);
            header("Location:index.php?controller=dichvu");
        }
    }
}
