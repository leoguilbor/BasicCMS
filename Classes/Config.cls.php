<?php
class ConfigLoad
{
    private  static $config;
    
    public static function setConfig()
    {        
        
        self::$config = simplexml_load_file("Config/config.xml");
        
    }

    public static function getConfig()
    {
        return self::$config;
    }



}

?>