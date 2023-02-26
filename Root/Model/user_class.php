<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Data/user_data_service.php');

class User 
{
    private $ID;
    private $user_name;
    private $password;

    public function __construct($ID, $user_name, $password)
    {
        $this->ID = $ID;
        $this->user_name = $user_name;
        $this->password = $password;
    }

    public function getID()
    {
        return $this->ID;
    }
    public function getUserName()
    {
        return $this->user_name;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public static function getUserFromDBByUserName($user_name)
    {
        return UserDataService::getUserFromDBByUserName_service($user_name);
    }
}

?>