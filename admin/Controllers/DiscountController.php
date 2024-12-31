<?php
include("Model/DiscountModel.php");
class DiscountController extends Controller
{
    use DiscountModel;
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
            $this->loadView("Discounts.php", ["data" => $data, "numPage" => $numPage]);
        }
    }
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $conn = Connection::getInstance();
            $query = $conn->query("select * from danhmuc");
            $category = $query->fetchAll();
            $this->loadView("AddDiscount.php", ['category' => $category]);
        }
    }
    public function store()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            if ($this->createDiscount() == false) {
                setcookie('createDiscountError', '1', time() + 3);
                header('location:index.php?controller=discount');
            } else {
                setcookie('createDiscountSuccess', '1', time() + 3);
                header('location:index.php?controller=discount');
            }
        }
    }
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            $this->destroy($id);
            if ($this->destroy($id) == true) {
                setcookie('deleteDiscountSuccess', '1', time() + 3);
                header('location:index.php?controller=discount');
            } else {
                setcookie('deleteDiscountError', '1', time() + 3);
                header('location:index.php?controller=discount');
            }
        }
    }
    public function change()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            $discount = $this->getDiscount($id);
            $conn = Connection::getInstance();
            $query = $conn->query("select * from danhmuc");
            $category = $query->fetchAll();
            $this->loadView("ChangeDiscount.php", ['discount' => $discount, 'category' => $category]);
        }
    }
    public function update(){
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            $this->updateDiscount($id);
            if ($this->updateDiscount($id) == true) {
                setcookie('updateDiscountSuccess', '1', time() + 3);
                header('location:index.php?controller=discount');
            } else {
                setcookie('updateDiscountError', '1', time() + 3);
                header('location:index.php?controller=discount');
            }
        }
    }
}
