<?php

// $pw = PASSWORD_HASH("Baboman1339", PASSWORD_DEFAULT);
// echo $pw;

$config = parse_ini_file('../db_config.ini');
// $conn = mysqli_connect($config['DB_SERVER'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);        
$conn = new mysqli($config['DB_SERVER'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);
// or die("ERROR IN CONNECT TO DB COÑO");        
if ($conn->connect_error)
{
    die("connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

echo phpinfo();

?>