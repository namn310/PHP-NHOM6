<?php
trait RegisterModel
{
    public function modelRegister()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $phone = $_POST["phone"];
        $local = $_POST["local"];
        $conn = Connection::getInstance();
        $check = $conn->prepare("select * from customers where email=:_email");
        $check->execute([":_email" => $email]);
        if ($check->rowCount() > 0) {
            // echo 0;
            return 0;
        } else {
            $password = md5($password);
            $query1 = $conn->prepare("insert into customers (name,address,email,pass,sodienthoai) values (:name,:local,:email,:pass,:phone)");
            $query1->execute([':name' => $name, ':email' => $email, ':pass' => $password, ':local' => $local, 'phone' => $phone]);
            //di chuyen den trang login
            // header("location:index.php?controller=account");
            return 1;
            // echo 1;
        }
    }
}
