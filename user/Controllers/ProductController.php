<?php
include("user/Model/ProductModel.php");
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ProductController extends Controller
{
    use ProductModel;
    public function index()
    {
        $data = $this->modelRead();
        $this->loadView("../user/Views/product.php", ["data" => $data]);
    }
    //Lấy thông tin danh mục để đổ ra view
    public function danhmuc()
    {
        $data = $this->modelRead();
        $this->loadView("../user/Views/product.php", ["data" => $data]);
    }
    //chi tiết sản phẩm
    public function detail()
    {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $record = $this->modelGetRecord($id);
        $comment = $this->getComment($id);
        $productListImg = $this->getAllImg($id);
        $productRelated = $this->getProductRelated($id);
        if (isset($_COOKIE["tokenLogin"])) {
            $getKey = new Controller();
            $key = $getKey->getKey();
            $token = $_COOKIE["tokenLogin"];
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $idUser = $decoded->idUser;
        } else {
            $idUser = 0;
        }
        $this->loadView(
            "../user/Views/product-detail.php",
            [
                "record" => $record,
                "comment" => $comment,
                "productListImg" => $productListImg,
                'productRelated' => $productRelated,
                'idUser' => $idUser
            ]
        );
    }
    //Bình luận sản phẩm
    public function addComment()
    {
        $idPro = isset($_GET["idPro"]) && is_numeric($_GET["idPro"]) ? $_GET["idPro"] : 0;
        $idCus = isset($_GET["idUs"]) && is_numeric($_GET["idUs"]) ? $_GET["idUs"] : 0;
        $this->modelComment($idPro, $idCus);
        header("location:index.php?controller=product&action=detail&id=" . $idPro);
    }
    public function sortProduct()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id_danhmuc form danhmuc limit 1");
        foreach ($query->fetchAll() as $row) {
            $idCat = $row->id_danhmuc;
        };
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : $idCat;
        $sortField = $_POST('sort_field');
        $sortOrder = $_POST('sort_order');
        // $productList = product::select()->where('idCat', $idCat)->orderBy($sortField, $sortOrder)->get();
        $query2 = $conn->query("select * from product order by $sortField $sortOrder");
        $productList = $query2->fetchAll();
        $product = [];
        foreach ($productList as $a) {
            $productItem = [
                'namePro' => $a->namePro,
                'cost' => number_format($a->giaban),
                'discount' => $a->discount,
                'costDiscount' => number_format($a->giaban - ($a->giaban * $a->discount) / 100),
                'image' => $a->getMainImage($a->idPro)
            ];
            $product[] = $productItem;
        }
        echo json_encode($product);
    }
}
