<?php
trait loginModel
{
    //xử lý đăng nhập
    public function modelLogin()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password1 = md5($password);
        $conn = Connection::getInstance();
        $query = $conn->prepare("select * from admin where pass=:password and email=:email ");
        $query->execute(["email" => $email, "password" => $password1]);
        if ($query->rowCount() > 0) {
            //---
            $record = $query->fetch();
            //---
            $_SESSION["admin_email"] = $record->email;
            $_SESSION["admin_id"] = $record->id;
            return true;
        } else
            return false;
    }
}
