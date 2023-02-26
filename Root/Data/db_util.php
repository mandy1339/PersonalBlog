<?php
class DBUtil
{
    static function get_db_connection() 
    {
        static $config;
        $config = parse_ini_file('../../db_config.ini');
        // $conn = mysqli_connect($config['DB_SERVER'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);        
        $conn = new mysqli($config['DB_SERVER'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);        
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        return $conn;
    }

    static function sanitize_data_from_form($POST_var) 
    {
        // $conn = self::get_db_connection();
        // return $conn->real_escape_string($POST_var);

        // return htmlspecialchars($POST_var);

        // return strip_tags($POST_var);

        return strip_tags($POST_var);
    }

}
?>