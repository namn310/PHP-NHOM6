<?php
//class ket noi csdl
class Connection
{
    public static function getInstance()
    {
        $conn = new PDO("mysql:hostname=localhost;dbname=petcaredb", "root", "");
        //chi dinh kieu duyet cac ban ghi
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->exec("set names utf8");
        return $conn;
    }
}
