<?php 
class PlayerInfo { 
     
    public static function GetLicenses($a) { 

        if ($a === '"[]"' || $a === '') { 
            return $licensesParsed; 
        }

        $licenses = explode('],[', $a);
        $licensesParsed = array(); 
        foreach ($licenses as $value) 
        {  
            $license = array();
            $value = str_replace('`', '', $value);
            $value = str_replace('"[[', '', $value);
            $value = str_replace(']]"', '', $value); 
            $explode = explode(',', $value); 
            array_push($license, $explode[0]); 
            array_push($license, $explode[1]); 
            array_push($licensesParsed, $license); 
        }  
        return $licensesParsed;
    }

}
           
?>

