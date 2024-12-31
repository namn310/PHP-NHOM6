<?php
include 'Model/ProductModel.php';
class ProductController extends Controller
{
    use ProductModel;
    //create
    //loadview product
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
            $this->loadView("quanlysanpham.php", ["data" => $data, "numPage" => $numPage]);
        }
    }
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $action = "index.php?controller=product&action=createPost";
            $conn = Connection::getInstance();
            $cat = $conn->query("select * from danhmuc");
            $this->loadView("Addsanpham.php", ["action" => $action, 'cat' => $cat]);
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
                header("Location:index.php?controller=product");
                setcookie("createProductError", "1", time() + 2);
            }
            setcookie("createProductSuccess", "1", time() + 2);
            header("Location:index.php?controller=product");
        }
    }
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            try {
                $this->modelDelete($id);
            } catch (Throwable) {
                header("Location:index.php?controller=product");
                setcookie("deleteProductError", "1", time() + 2);
            }
            header("Location:index.php?controller=product");
            setcookie("deleteProductSuccess", "1", time() + 2);
        }
    }
    public function change()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;
            $conn = Connection::getInstance();
            $cat = $conn->query("select * from danhmuc");
            $record1 = $this->modelGetRecord($id);
            $this->loadView("FormChangeProduct.php", ["record1" => $record1, "cat" => $cat]);
        }
    }
    public function changePost()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['idPro']) && is_numeric($_GET['idPro']) ? $_GET['idPro'] : 0;
            try {
                $this->modelChange($id);
            } catch (Throwable) {
                header("Location:index.php?controller=product");
                setcookie("updateProductError", "1", time() + 2);
            }
            setcookie("updateProductSuccess", "1", time() + 2);
            header("Location:index.php?controller=product");
        }
    }
}
