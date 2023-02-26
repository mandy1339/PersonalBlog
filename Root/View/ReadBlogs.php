<?php

require_once('../Template/Initialization.php');
require_once('../Template/SecurityCheck.php');
require_once('../Model/blogpost_class.php');
require_once('../Template/NavigationHeader.php');
require_once('./Styling/StyleManager.php');

$StyleGPT1 = StyleManager::IncludeGTPStyle01();
$StyleGPT2 = StyleManager::IncludeGTPStyle02();
$StyleMy01 = StyleManager::IncludeMyStyle01();

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Armando's Personal Blog - Read</title>
    $StyleGPT1
    $StyleGPT2
    $StyleMy01
</head>
<body>
HTML;


# User is logged in so we can show this page
# add links to other pages
Navigation::get_navigation_header();

echo "<h1>Read</h1>";

# read all the blog posts
$allBlogPosts = BlogPost::getAllBlogPosts();
$site_name = Navigation::get_site_name();  # this allows setting up the web page in a subfolder and still get valid post links

# display every blog post
foreach ($allBlogPosts as $blogPost)
{
    $content = nl2br($blogPost->getContent());
    $date = date("l F jS, Y - g:ia", strtotime($blogPost->getCreatedDate()));
    echo <<<HTML
    <br>
    <div class="BlogPostCSSClass">
        <!-- ID: {$blogPost->getID()}
        <br> -->
        <b>Title: </b>{$blogPost->getTitle()}

        <!-- edit button on the right -->
        <form action="$site_name/View/EditBlog.php" method="post" class="FloatRight">
            <input type="hidden" name="hidden_blog_post_id" value="{$blogPost->getID()}">
            <input type="submit" value="Edit">
        </form>

        <br>     

        <b>Date: </b>$date
        <br>
        <br>
        <!-- ModifiedDate: {$blogPost->getModifiedDate()}
        <br> -->
        $content
        <br>
        <!-- UserID: {$blogPost->getUserID()}
        <br> -->
    </div>
HTML;
}


echo <<<HTML
</body>
</html>
HTML;
?>