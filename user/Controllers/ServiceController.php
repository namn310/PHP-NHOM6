<?php
include("user/Model/ServiceModel.php");
class ServiceController extends Controller
{
    use ServiceModel;
    public function index()
    {
        $data = $this->getService();
        $this->loadView("../user/Views/service.php", ['data' => $data]);
    }
}
