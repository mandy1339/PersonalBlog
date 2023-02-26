<?php
require_once('../Template/Initialization.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Template/SecurityCheck.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Template/NavigationHeader.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/View/Styling/StyleManager.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/blogpost_class.php');


$StyleGPT1 = StyleManager::IncludeGTPStyle01();
$StyleGPT2 = StyleManager::IncludeGTPStyle02();
$StyleMy01 = StyleManager::IncludeMyStyle01();

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Armando's Personal Blog - Edit</title>    
    $StyleGPT1
    $StyleGPT2
    $StyleMy01
</head>
<body>
HTML;

Navigation::get_navigation_header();

# Load the $blog_post data
$blog_post;
if (isset($_POST['hidden_blog_post_id'])) {
    $blog_post = BlogPost::GetBlogPostByID($_POST['hidden_blog_post_id']);
}
else {
    echo "ERROR FETCHING BLOG TO EDIT!";
}


# User is logged in so we can show this page
# add links to other pages

echo <<<HTML
<!-- Page Name -->
<h1>Edit</h1> 

<!-- Delete Button -->
<form action="../Controller/EditBlogController.php" class="FloatRight" method="post">
    <input type ="hidden" name="hidden_delete_blog_id" value="{$blog_post->getID()}">
    <input type ="submit" value="Delete Post" class="MarginBottom8px">
</form>
HTML;


echo <<<HTML
<!-- Title and Content -->
<form action='../Controller/EditBlogController.php' method='post' id="blog_post_form">
    <input type ="hidden" name="hidden_edit_blog_id" value="{$blog_post->getID()}">
    <input type="text" value="{$blog_post->getTitle()}" name="blog_post_title_text_box" style="width:1000px" placeholder="Title"/>
    <br>
    <br>
<textarea name="blog_post_text_box" style="width:1000px; height:500px" placeholder="Blog Post Content" form="blog_post_form">
{$blog_post->getContent()} 
</textarea>
    <br>
    <br>
    <input type="submit" value="Apply Edits">
</form>
HTML;



echo <<<HTML
</body>
</html>
HTML


?>