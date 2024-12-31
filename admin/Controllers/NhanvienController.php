<?php
include("Model/NhanvienModel.php");
class NhanvienController extends Controller
{

    use NhanvienModel;
    public function index()
    {
        //nếu đăng nhập rồi thì mới load view ra không thì sẽ load về trang login
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Quanlynhanvien.php");
        }
    }
    //load view thêm nhân viên
    public function create()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Addnhanvien.php");
        }
    }
    // chức năng tạo mới nhân viên
    public function createPost()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->modelCreate();
            header("Location:index.php?controller=nhanvien");
        }
    }
    // xóa nhân viên
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $this->delete($id);
            header("Location:index.php?controller=nhanvien");
        }
    }
}
