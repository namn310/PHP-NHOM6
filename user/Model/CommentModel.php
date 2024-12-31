<?php 
class CommentController extends Controller{
    public function index(){
        $this->loadView("Comment.php");
    }
}
?>