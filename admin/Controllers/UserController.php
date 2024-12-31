<?php
include "Model/UserModel.php";
class UserController extends Controller
{
    use UserModel;
    public function index()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->loadView("users-profile.php");
        }
    }
    //thay đổi mật khẩu admin
    public function updatePass()
    {
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $this->changePass();
        }
    }
}
