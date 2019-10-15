<?php 

class Globals {   
    private static $classes_dir = "classes\\";
    private static $includes_dir = "includes\\";

    private static function LoadClass($class){  
        require(self::$classes_dir . $class . ".php");
    }

    public static function LoadAndTerminate($filename){ 
        die(file_get_contents(self::$includes_dir . $filename));
    }  

    public static function Browser()
    {
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
            return 'InternetExplorer';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
            return 'InternetExplorer';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
            return 'MozillaFirefox';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
            return 'GoogleChrome';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'OperaMini') !== false)
            return "OperaMini";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
            return "Opera";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
            return "Safari";
        else
            return 'Other';
    }

    public static function BrowserAllowed()
    {  
        $clientbrowser = self::Browser();
        return (isset($_SERVER['HTTP_USER_AGENT']) && json_decode(file_get_contents("config.json"))->supported_browsers->$clientbrowser === "true");;
    }

    public function __construct($classnames = array()) {
        if (self::BrowserAllowed()){ 
            session_start(); 
            foreach($classnames as $classname)  
                self::LoadClass($classname); 
        }else{
            self::LoadAndTerminate("unsupported.html");
        }
    }
}  
 
new Globals(array(
    'Database',
    'PlayerInfo',
    'Leaderboard'
));

  



