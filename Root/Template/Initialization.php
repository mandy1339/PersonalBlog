<?php

# set the session if it hasn't been set
if (!isset($_SESSION))
{
    session_start();
}

# If user is already logged in, extend the cookie duration
if ((isset($_SESSION) && isset($_SESSION['User']) && ISSET($_SESSION['UserID'])))
{
    setcookie('User', $_SESSION['User'], time() + 60 * 60 * 24 * 10, '/'); // Extend logged in duration for 10 more days via Cookie
    setcookie('UserID', $_SESSION['UserID'], time() + 60 * 60 * 24 * 10, '/'); // Extend logged in duration for 10 more days via Cookie
}
else if (isset($_COOKIE) && isset($_COOKIE['User']) && ISSET($_COOKIE['UserID']))
{
    setcookie('User', $_COOKIE['User'], time() + 60 * 60 * 24 * 10, '/'); // Extend logged in duration for 10 more days via Cookie
    setcookie('User', $_COOKIE['UserID'], time() + 60 * 60 * 24 * 10, '/'); // Extend logged in duration for 10 more days via Cookie
}


# Get the document root value from configuration and save it in the super global variable
# The config file is 2 levels back in order to ensure it's not served by the web server
# Save the doc_root variable as static to avoid opening the config file too many times
// static $doc_root;
// if (!isset($doc_root))
// {
//     $dir = __DIR__;
//     $config = parse_ini_file("$dir/../../config.ini");
//     $doc_root = $config['DOCUMENT_ROOT'];
// }
// $_SERVER['DOCUMENT_ROOT'] = $doc_root; 


?>