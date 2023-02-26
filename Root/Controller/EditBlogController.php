<?php
require_once('../Template/Initialization.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Template/SecurityCheck.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/blogpost_class.php');

if (!isset($_POST['hidden_delete_blog_id']) && !isset($_POST['hidden_edit_blog_id']))
{
    header("Location: ../View/WriteBlog.php");
    exit;
}

# HANDLE DELETE -------------------------------------------
if (isset($_POST['hidden_delete_blog_id'])) {
    BlogPost::deleteBlogPost($_POST['hidden_delete_blog_id']);
}

# HANDLE EDIT -------------------------------------------
else if (isset($_POST['hidden_edit_blog_id'])) {
    BlogPost::editBlogPost($_POST['hidden_edit_blog_id'], $_POST['blog_post_title_text_box'], $_POST['blog_post_text_box']);
}

header("Location: ../View/ReadBlogs.php");
    exit;


?>