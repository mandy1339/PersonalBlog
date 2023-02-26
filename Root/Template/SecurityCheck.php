<?php

# start or resume session
if (!isset($_SESSION))
{
    session_start();
}

# if user is not logged in via session
if (!(isset($_SESSION['User']) && isset($_SESSION['UserID'])))
{
    # and also not logged in via cookie
    if (!(isset($_COOKIE['User']) && isset($_COOKIE['UserID'])))
    {
        # redirect to login page
        header("Location: View/Login.php");
        exit;
    }
    # if session log in is not set, but Cookie login was, then Add the User information to the Session
    else
    {
        $_SESSION['User'] = $_COOKIE['User']; // TODO Potential security risk
        $_SESSION['UserID'] = $_COOKIE['UserID']; // TODO Potential security risk
    }
}
# else stay on this page
?>