<?php
require_once('../Template/Initialization.php');
require_once('../Template/SecurityCheck.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Model/blogpost_class.php');

if (!isset($_POST))
{
    header("Location: ../View/ReadBlogs.php");
    exit;
}

# We don't do anything here yet


header("Location: ../View/ReadBlogs.php");
exit;

?>