<?php
trait BookModel
{
    public function getBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from booking where id=$id");
        return $query->fetchAll();
    }
    //tạo lịch đặt
    public function createBook($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['Bossname'];
        $service = $_POST['dichvu'];
        $type = $_POST['Bosstype'];
        $goi = $_POST['goi'];
        $weight = $_POST['weight'];
        $dateBook = $_POST['date'];
        $dateCreate = date("d-m-y");
        $query = $conn->prepare("insert into booking(idCus,nameService,type,goi,namePet,weight,dateBook,dateCreate) values (:id,:nameService,:type,:goi,:name,:weight,:dateBook,:dateCreate)");
        $query->execute([
            "id" => $id,
            "nameService" => $service,
            "type" => $type,
            "goi" => $goi,
            "name" => $name,
            "weight" => $weight,
            "dateBook" => $dateBook,
            "dateCreate" => $dateCreate
        ]);
    }
    // thay đổi lịch đặt
    public function changeBooking($id)
    {
        $conn = Connection::getInstance();
        $name = $_POST['Bossname'];
        $service = $_POST['dichvu'];
        $type = $_POST['Bosstype'];
        $goi = $_POST['goi'];
        $weight = $_POST['weight'];
        $dateBook = $_POST['date'];
        $query = $conn->prepare("update booking set nameService=:nameService,type=:type,goi=:goi,namePet=:name,weight=:weight,dateBook=:dateBook ");
        $query->execute([":nameService" => $service, ":type" => $type, "goi" => $goi, ":name" => $name, ":weight" => $weight, ":dateBook" => $dateBook]);
        echo ('<script>alert("Thay đổi lịch thành công");
        window.location.href = "index.php?controller=book&action=BookHistory";
        </script>');

        // header("location:index.php?controller=book&action=BookHistory");
    }
    //xóa lịch
    public function deleteBooking($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from booking where id=:id");
        $query->execute(['id' => $id]);
    }
}
