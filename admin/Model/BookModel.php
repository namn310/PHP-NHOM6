<?php
trait BookModel
{
    //hàm liệt kê danh sách có phân trang
    public function modelRead($recordPerPage)
    {
        //Tổng số bản ghi
        $total = $this->modelTotal();
        //tính số trang
        $numPage = ceil($total / $recordPerPage);
        //lấy số trang hiện tại truyền từ URL
        $page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] - 1 : 0;
        //lấy từ bản ghi nào
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("select * from booking order by id desc limit $from, $recordPerPage");
        return $query->fetchAll();
    }
    //hàm tính tổng số bản ghi
    public function modelTotal()
    {

        $conn = Connection::getInstance();
        $query = $conn->query("select id from booking");
        return $query->rowCount();
    }
    //lấy chi tiết lịch hẹn
    public function getDetailBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT customers.*, booking.* 
                         FROM booking 
                         INNER JOIN customers 
                         ON customers.id = booking.idCus 
                         WHERE booking.id = :id");
        $query->execute(['id' => $id]);
        return $result = $query->fetch(PDO::FETCH_ASSOC);
    }
    //xác nhận lịch hẹn
    public function confirmBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("update booking set tinhtrangBook=:tinhtrang");
        $query->execute(["tinhtrang" => 1]);
    }
    //hủy lịch hẹn
    public function unconfirmBook($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("update booking set tinhtrangBook=:tinhtrang");
        $query->execute(["tinhtrang" => '']);
    }
    //xóa lịch hẹn
    public function deleteBooking($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("delete from booking where id=:id");
        $query->execute(['id' => $id]);
    }
}
