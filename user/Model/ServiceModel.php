<?php
trait ServiceModel
{
    public function getService()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from dichvu");
        return $query->fetchAll();
    }
}
