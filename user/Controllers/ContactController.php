<?php
class ContactController extends Controller
{
    public function index()
    {
        $this->loadView("../user/Views/contact.php");
    }
}
