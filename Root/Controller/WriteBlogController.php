<?php
require_once('../Template/Initialization.php');
require_once('../Template/SecurityCheck.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Model/blogpost_class.php');

if (!isset($_POST))
{
    header("Location: ../View/WriteBlog.php");
    exit;
}

$blog_post = DBUtil::sanitize_data_from_form($_POST['blog_post_text_box']);
$blog_post_title = DBUtil::sanitize_data_from_form($_POST['blog_post_title_text_box']);
BlogPost::AddNewBlogPost($blog_post_title, $blog_post, $_SESSION['UserID']);

header("Location: ../View/ReadBlogs.php");
exit;

?>