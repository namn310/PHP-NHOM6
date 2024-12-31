<?php
trait UserModel
{
    public function changePass()
    {
        $conn = Connection::getInstance();
        $email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';
        $oldPass = isset($_POST['currentPass']) ? $_POST['currentPass'] : '';
        $newPass = isset($_POST['newPass']) ? $_POST['newPass'] : '';
        $md5OldPass = md5($oldPass);
        $query = $conn->prepare("SELECT id FROM admin WHERE pass=:pass AND email=:email");
        $query->execute(['pass' => $md5OldPass, 'email' => $email]);
        if ($query->rowCount() < 1) {
            setcookie("error1", "1", time() + 2);
            exit();
        }
        try {
            $md5NewPass = md5($newPass);
            $query2 = $conn->prepare("UPDATE admin SET pass=:pass WHERE email=:email");
            $query2->execute(['pass' => $md5NewPass, 'email' => $email]);
            setcookie("success", "2", time() + 2);
            exit();
        } catch (Throwable) {
            // Xử lý lỗi (nếu có)
            setcookie("error2", "3", time() + 2);
            exit();
        }
    }
}
