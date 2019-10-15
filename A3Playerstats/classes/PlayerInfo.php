<?php 
    class PlayerInfo {  

        public static function DisplayDays($arma_time){
            $days = (int)(((int)date('U') - (int)date('U', strtotime($arma_time)))/86400); 
            
            if($days == 0){
                return "Today";
            }elseif($days == 1){
                return "Yesterday";
            }elseif($days > 1){
                return "{$days} Days Ago";
            } 
        }
  
        public static function DisplayMoney($money){
            return ((int)$money > 0) ?  "$ ".number_format($money,0,",",".") : "Nil"; 
        }
   
        public static function DisplayLicenses($arma_string_array) {  
            $licenses_available = array();  
            $licenses_unavailable = array(); 
 
            foreach (Database::ParseA3String($arma_string_array) as $license) 
            {      
                $lic_name_explode = explode('_', $license[0]);   
                $lic_name_explode[0] = strtolower($lic_name_explode[0]); // license
                $lic_name_explode[1] = strtolower($lic_name_explode[1]); // civ | cop | med
                $lic_name_explode[2] = ucfirst($lic_name_explode[2]);    // Name
 
                if($lic_name_explode[0] == "license"){ 
                    if($lic_name_explode[1] == "civ" || $lic_name_explode[1] == "cop" || $lic_name_explode[1] == "med"){ 
                        if($lic_state == 0){
                            array_push($licenses_available, array($lic_name_explode[2], $license[1], $lic_name_explode[1]));  
                        }elseif($lic_state == 1){
                            array_push($licenses_unavailable, array($lic_name_explode[2], $license[1], $lic_name_explode[1]));     
                        } 
                    }
                } 
            }  

            return array_merge($licenses_unavailable, $licenses_available);
        }
    }        
?>

