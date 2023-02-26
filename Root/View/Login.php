<?php
require('../Template/Initialization.php');
# TODO If user is already logged in redirect to Index page
if (isset($_SESSION) && isset($_SESSION['User']) && ISSET($_SESSION['UserID']))
{
    header ('location: ../index.php');
}


echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Log In</title>
</head>
<body>
HTML;

echo "<h1>Log In</h1>";
echo <<<HTML
<pre>
<form action='../Controller/LoginController.php' method='post'>    
User Name <input type="text" name="input_user_name">
 Password <input type="password" name="input_password">

          <input type="submit" value='Log In'>
</form>          
</pre>
HTML;

# if redirected back here from Login Controller, it means we failed login. Therefore display error message
if (isset($_SESSION['LoginError']) && $_SESSION['LoginError'] === true)
{
    echo <<<HTML
        <h1 style="color:red">Login Error, Try Again</h1>
HTML;
}




echo <<<HTML
</body>
</html>
HTML
?>