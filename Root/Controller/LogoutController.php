<?php
if (!isset($_SESSION))
    session_start();

# logout logic: destroy session and cookies
if (isset($_COOKIE['UserID']))
    setcookie('UserID', '', time() - 50000);
if (isset($_COOKIE['User']))
    setcookie('User', '', time() - 50000);
setcookie(session_name(), '', time() - 50000);    
if (isset($_SESSION['UserID']))
    unset($_SESSION['UserID']);
if (isset($_SESSION['User']))
    unset($_SESSION['User']);
    
session_unset();
session_destroy();
session_write_close();
session_regenerate_id(true);

# redirect to login page after destroying session and cookies
header("Location: ../View/Login.php");
exit;    

?>