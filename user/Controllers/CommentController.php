
<?php
class CommentController extends Controller
{
    public function index()
    {
        $this->loadView("../user/Views/Comment.php");
    }
}
?>