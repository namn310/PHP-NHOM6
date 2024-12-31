<?php
class KhachhangController extends Controller
{
    public function index()
    {
        //nếu đăng nhập rồi thì mới load view ra không thì sẽ load về trang login
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("Quanlykhachhang.php");
        }
    }
}
