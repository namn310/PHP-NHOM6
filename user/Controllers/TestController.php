<?php
class TestController extends Controller
{
    public function index()
    {
        $this->loadView("../user/Views//Test.php");
    }
    public function productApi()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product");
        $product = $query->fetchAll();
        // header('Content-Type: application/json');
        // print_r($product);
        echo json_encode($product);
    }
}
