<?php
trait UserModel
{
    //đổi thông tin user
    public function update($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $local = $_POST['local'];
        $query = $conn->prepare("update customers set name=:_name, address=:_address,sodienthoai=:_phone ");
        $query->execute([":_name" => $name, ":_address" => $local, ":_phone" => $phone]);
    }
    public function getUser($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select name,sodienthoai from customers where id=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return ['name' => $row->name, 'phone' => $row->sodienthoai];
        }
    }
    public function updatePassword($id)
    {
        $conn = Connection::getInstance();
        $old_pass = $_POST['currentPass'];
        $new_pass = $_POST['newPass'];
        $md5OldPass = md5($old_pass);
        $query = $conn->prepare("select id from customers where id=:id and pass=:pass");
        $query->execute(['id' => $id, 'pass' => $md5OldPass]);
        if ($query->rowCount() < 1) {
            setcookie("updatePassCusError1", "1", time() + 2);
        } else {
            try {
                $md5Newpass = md5($new_pass);
                $query2 = $conn->prepare("update customers set pass=:pass where id=:id");
                $query2->execute(['pass' => $md5Newpass, 'id' => $id]);
                setcookie("updatePassCusSuccess", "1", time() + 2);
            } catch (Throwable) {
                setcookie("updatePassCusError2", "1", time() + 2);
            }
        }
    }
}
