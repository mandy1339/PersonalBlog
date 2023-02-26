<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Template/NavigationHeader.php');



class StyleManager 
{
    public static function IncludeGTPStyle01()
    {
        $path = Navigation::get_site_name() . "/View/Styling/gptStyle01.css";
        return "<link href=\"$path\" rel=\"stylesheet\" type=\"text/css\" />";
    }
    public static function IncludeGTPStyle02()
    {
        $path = Navigation::get_site_name() . "/View/Styling/gptStyle02.css";
        return "<link href=\"$path\" rel=\"stylesheet\" type=\"text/css\" />";
    }
    public static function IncludeMyStyle01()
    {
        $path = Navigation::get_site_name() . "/View/Styling/myClass01.css";
        return "<link href=\"$path\" rel=\"stylesheet\" type=\"text/css\" />";
    }
}

?>