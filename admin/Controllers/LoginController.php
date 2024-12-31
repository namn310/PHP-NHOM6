<?php
include "Model/loginModel.php";
class LoginController extends Controller
{
    use loginModel;
    public function index()
    {
        $this->loadView("pages-login.php");
    }
    public function login()
    {
        try {
            if ($this->modelLogin() == true) {
                setcookie("welcome","Chào mừng trở lại !",time()+2);
                header("location:index.php");
            } else {
                setcookie("errorLogin", "Tài khoản hoặc mật khẩu không chính xác !", time() + 3);
                header("location:index.php");
            }
        } catch (Throwable) {
            setcookie("error", "Có lỗi xảy ra vui lòng thử lại sau", time() + 3);
            header("location:index.php");
        }
    }
    public function logOut()
    {
        unset($_SESSION["admin_email"]);
        header("location:index.php");
    }
}
