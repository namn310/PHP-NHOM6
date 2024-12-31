<?php
session_start();
//load file Connection.php
include "../connection/Connection.php";
//load file controller
include "../connection/Controller.php";
?>
 <?php
  $controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
  $action = isset($_GET["action"]) ? $_GET["action"] : "index";
  //Nối chuỗi để thành file controller
  $fileController = "Controllers/$controller" . "Controller.php";
  $classController = "$controller" . "Controller";
  //kiểm tra nếu file tồn tại thì load ra
  if (file_exists($fileController)) {
    include $fileController;
    //khởi tạo obj
    $obj = new $classController();
    //gọi hàm trong object
    $obj->$action();
  }

  ?>