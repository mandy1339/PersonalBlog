<?php

require_once('../Template/Initialization.php');
require_once('../Template/SecurityCheck.php');
require_once('../Template/NavigationHeader.php');
require_once('./Styling/StyleManager.php');

$StyleGPT1 = StyleManager::IncludeGTPStyle01();
$StyleGPT2 = StyleManager::IncludeGTPStyle02();

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Armando's Personal Blog - Write</title>    
    $StyleGPT1
    $StyleGPT2
</head>
<body>
HTML;

Navigation::get_navigation_header();

# User is logged in so we can show this page
# add links to other pages

echo "<h1>Write</h1>";

echo <<<HTML
<form action='../Controller/WriteBlogController.php' method='post' id="blog_post_form">
    <input type="text" name="blog_post_title_text_box" style="width:1000px" placeholder="Title"/>
    <br>
    <br>
    <textarea name="blog_post_text_box" style="width:1000px; height:500px" placeholder="Blog Post Content" form="blog_post_form"></textarea>
    <br>
    <br>
    <input type="submit" value="Add This Blog Post">
</form>
HTML;



echo <<<HTML
</body>
</html>
HTML
?>