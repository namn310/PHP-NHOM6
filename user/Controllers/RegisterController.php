<?php
include "user/Model/RegisterModel.php";
class RegisterController extends Controller
{
    use RegisterModel;

    public function index()
    {
        $this->loadView("../user/Views/sign_in.php");
    }
    public function registerPost()
    {
        // setcookie("success", "Đăng ký thành công !", time() + 3);
        if ($this->modelRegister() != 0) {
            setcookie("success", "Đăng ký thành công !", time() + 2);
            // $response = "Success";
            echo json_encode([
                'status' => 'success',
            ]);
            // echo $response;
        } else {
            echo json_encode([
                'status' => 'error',
            ]);
            setcookie("error", "Email đã tồn tại !", time() + 2);
            // $response = "error";
            // echo $response;
        }
        header("location:index.php?controller=register");
    }
}
