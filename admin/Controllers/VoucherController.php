<?php
include "Model/VoucherModel.php";
class VoucherController extends Controller
{
    use VoucherModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            //quy dinh so ban gi 1 trang
            $recordPerPage = 10;
            //ham celi lam chan;
            $numPage = ceil($this->modelTotal() / $recordPerPage);
            //đọc bản ghi sql để xổ dữ liệu vào view
            $data = $this->modelRead($recordPerPage);
            $this->loadView("Vouchers.php", ["data" => $data, "numPage" => $numPage]);
        }
    }
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("AddVoucher.php");
        }
    }
    public function store()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $result = $this->createVoucher();
            if ($result == false) {
                setcookie("createVoucherFalse", "1", time() + 3);
            } else {
                setcookie("createVoucherSuccess", "1", time() + 3);
            }
        }
    }
    public function change()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $query = $conn->prepare("select * from vouchers where id=:id");
            $query->execute(['id' => $id]);
            $result = $query->fetchAll();
            $this->loadView("ChangeVoucher.php", ['result' => $result]);
        }
    }
    public function update()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            if ($this->updateVoucher($id) == 1) {
                setcookie("UpdateVoucherFalse", "1", time() + 3);
            } elseif ($this->updateVoucher($id) == 2) {
                setcookie("UpdateVoucherError", "1", time() + 3);
            } else {
                setcookie("UpdateVoucherSuccess", "1", time() + 3);
            }
        }
    }
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            try {
                $this->deleteVoucher($id);
            } catch (Throwable) {
                setcookie("error", "1", time() + 2);
                header('location:index.php?controller=voucher');
            }
            setcookie("success", "1", time() + 2);
            header('location:index.php?controller=voucher');
        }
    }
}
