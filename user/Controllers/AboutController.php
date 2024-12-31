<?php
class AboutController extends Controller
{
    public function index()
    {
        $this->loadView("../user/Views/about.php");
    }
}
