<?php
include "Model/BookModel.php";
class BookController extends Controller
{
    use BookModel;
    public function index()
    {
        //nếu đăng nhập rồi thì mới load view ra không thì sẽ load về trang login
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotal() / $recordPerPage);
            $listRecord = $this->modelRead($recordPerPage);

            $this->loadView("Quanlybook.php", ["listRecord" => $listRecord, "numPage" => $numPage]);
        }
    }
    //load chi tiết lịch hẹn
    public function detail()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $data = $this->getDetailBook($id);
            $this->loadView("BookDetail.php", ["data" => $data]);
        }
    }
    //Xác nhận lịch hẹn
    public function confirm()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $this->confirmBook($id);
            header("location:index.php?controller=book");
        }
    }
    //hủy lịch hẹn
    public function unconfirm()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $this->unconfirmBook($id);
            header("location:index.php?controller=book");
        }
    }
    //Xóa lịch hẹn
    public function delete()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $this->deleteBooking($id);
            echo ('<script>confirm("xóa lịch thành công")</script>');
            header("location:index.php?controller=book");
        }
    }
}
