<?php
include "Model/DonhangModel.php";
class DonhangController extends Controller
{
    use DonhangModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotal() / $recordPerPage);
            $listRecord = $this->modelRead($recordPerPage);
            $this->loadView("Quanlydonhang.php", ["listRecord" => $listRecord, "numPage" => $numPage]);
        }
    }
    //chi tiet don hang
    public function detail()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $data = $this->modelListOrderDetails($id);
            $this->loadView("ChiTietDonHang.php", ["data" => $data, "id" => $id]);
        }
    }
    //xóa đơn hàng
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            try {
                $this->deleteOrder($id);
            } catch (Throwable) {
                setcookie("deleteOrderError", "1", time() + 3);
                header("Location:index.php?controller=donhang");
            }
            setcookie("deleteOrderSuccess", "1", time() + 3);
            header("Location:index.php?controller=donhang");
        }
    }
    public function delivery()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            try {
                $this->deliveryModel($id);
            } catch (Throwable) {
                setcookie("deliveryOrderError", "1", time() + 3);
                header("Location:index.php?controller=donhang");
            }
            setcookie("deliveryOrderSuccess", "1", time() + 3);
            header("Location:index.php?controller=donhang");
        }
    }
}
