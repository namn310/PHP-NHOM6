<?php
trait NhanvienModel
{
    //Thêm nhân viên
    public function modelCreate()
    {
        $name = $_POST['nameNV'];
        $email = $_POST['emailNV'];
        $local = $_POST['localNV'];
        $phone = $_POST['phoneNV'];
        $dateNV = $_POST['dateNV'];
        $CMND = $_POST['CMND'];
        $sex = $_POST['sex'];
        $chucvu = $_POST['chucvuNV'];
        //xulyhinhanh
        $hinhanh = $_FILES['imgNV']['name'];
        $hinhanh_tmp = $_FILES['imgNV']['tmp_name'];
        $hinhanh = time() . '_' . $hinhanh;
        $dateAdd = date("d-m-y");

        $conn = Connection::getInstance();
        $conn->exec('INSERT INTO nhanvien(tenNV, anhNV, diachi, birth, sex, phone, chucvu, email,cmnd,dateadd) VALUES ("' . $name . '","' . $hinhanh . '","' . $local . '","' . $dateNV . '","' . $sex . '","' . $phone . '","' . $chucvu . '","' . $email . '","' . $CMND . '","' . $dateAdd . '")');
        move_uploaded_file($hinhanh_tmp, "../assets/img-nhanvien/" . $hinhanh);
    }
    public function delete($id)
    {
        $conn = Connection::getInstance();
        $conn->exec("delete from nhanvien where idNV=$id");
    }
}
