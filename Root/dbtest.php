<?php
$config = parse_ini_file('./../db_config.ini');
$conn = mysqli_connect($config['DB_SERVER'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);


?>