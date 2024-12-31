<?php

trait ProductModel
{
    //đọc dữ liệu từ sql
    public function modelRead($recordPerPage)
    {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        // lấy từ bản ghi nào
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM product ORDER BY idPro DESC limit $from,$recordPerPage");
        $result = $query->fetchAll();
        return $result;
    }
    //tính tổng số bản ghi
    public function modelTotal()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select idPro from product ");
        return $query->rowCount();
    }
    //lấy thông tin sản phẩm
    public function modelGetRecord($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("SELECT * from product where idPro=:id limit 1");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }
    //thêm sản phẩm
    public function modelCreate()
    {
        $conn = Connection::getInstance();
        $product_name = $_POST['namepro'];
        $product_quantity = $_POST['countpro'];
        $product_giaban = $_POST['giabanpro'];
        $product_giavon = $_POST['giavonpro'];
        $discount = $_POST['discount'];
        $descrip = $_POST['mota'];
        $category = $_POST['danhmucAddpro'];
        $dateAdd = date("d-m-y");
        $query = $conn->prepare("insert into product set idCat=:idCat,namePro=:name,count=:count,giaban=:giaban,giavon=:giavon,discount=:discount,mota=:mota,timeadd=:time");
        $query->execute([
            'idCat' => $category,
            'name' => $product_name,
            'count' => $product_quantity,
            'giaban' => $product_giaban,
            'giavon' => $product_giavon,
            'discount' => $discount,
            'mota' => $descrip,
            'time' => $dateAdd
        ]);
        $productId = $conn->lastInsertId();
        //xulyhinhanh
        $index = 0;
        foreach ($_FILES['imagepro']['name'] as $key => $hinhanh) {
            $index++;
            $hinhanh_tmp = $_FILES['imagepro']['tmp_name'][$key];
            $hinhanh = $index . '_' . time() . '_' . $hinhanh;
            move_uploaded_file($hinhanh_tmp, "../assets/img-add-pro/" . $hinhanh);
            $query2 = $conn->prepare("insert into image_products set image=:image,idPro=:idPro,create_at=:time");
            $query2->execute([
                'image' => $hinhanh,
                'idPro' => $productId,
                'time' => $dateAdd
            ]);
        }
        // $hinhanh = $_FILES['imagepro']['name'];
    }
    //Sửa sản phẩm
    public function modelChange($id)
    {
        $conn = Connection::getInstance();
        $product_name = $_POST['namepro'];
        $product_quantity = $_POST['countpro'];
        $product_giaban = $_POST['giabanpro'];
        $product_giavon = $_POST['giavonpro'];
        $discount = $_POST['discount'];
        $descrip = $_POST['mota'];
        $category = $_POST['danhmucAddpro'];
        $query = $conn->prepare("update product set idCat=:idCat,namePro=:name,count=:count,giaban=:giaban,giavon=:giavon,discount=:discount,mota=:mota where idPro=:id");
        $query->execute([
            'idCat' => $category,
            'name' => $product_name,
            'count' => $product_quantity,
            'giaban' => $product_giaban,
            'giavon' => $product_giavon,
            'discount' => $discount,
            'mota' => $descrip,
            'id' => $id
        ]);
        //xulyhinhanh
        $index = 0;
        if (!empty($_FILES['imagepro']['name'][0])) {
            foreach ($_FILES['imagepro']['name'] as $key => $hinhanh) {
                $index++;
                $hinhanh_tmp = $_FILES['imagepro']['tmp_name'][$key];
                $hinhanh = $index . '_' . time() . '_' . $hinhanh;
                move_uploaded_file($hinhanh_tmp, "../assets/img-add-pro/" . $hinhanh);
                $query2 = $conn->prepare("update image_products set image=:image where idPro=:idPro");
                $query2->execute([
                    'image' => $hinhanh,
                    'idPro' => $id,
                ]);
            }
        }
    }
    //xóa sản phẩm
    public function modelDelete($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select image from image_products where idPro=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            if (file_exists("../assets/img-add-pro/" . $row->image)) {
                unlink("../assets/img-add-pro/" . $row->image);
            }
        }
        $query2 = $conn->prepare("delete from product where idPro=:id");
        $query2->execute(['id' => $id]);
    }
    public function getMainImage($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select image from image_products where idPro=:id limit 1");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->image;
        }
    }
    public function getAllImg($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select image from image_products where idPro=:id");
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }
    public function getNameCat($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->prepare("select tendanhmuc from danhmuc where id_danhmuc=:id");
        $query->execute(['id' => $id]);
        foreach ($query->fetchAll() as $row) {
            return $row->tendanhmuc;
        }
    }
}
