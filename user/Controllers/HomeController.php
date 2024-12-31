<?php
//load file model

include "user/Model/HomeModel.php";
class HomeController extends Controller
{
    use HomeModel;
    public function __construct()
    {
    }
    public function index()
    {
        //load view
        $this->loadView("../user/Views/HomeView.php");
    }
}
