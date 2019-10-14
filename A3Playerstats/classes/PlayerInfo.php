<?php 
    class PlayerInfo { 
        
        public static function DisplayDays($arma_time){
            $days = (int)(((int)date('U') - (int)date('U', strtotime($arma_time)))/86400);
    
            if($days > 0){
                return "{$days} Days Ago"; 
            } 

            return "Today";
        }
    
        public static function DisplayUserCash($cash){
            $cashvalue = "Nil";
            if((int)$cash > 0){ 
                $cashvalue = $cash;
                return "$ {$cashvalue}";  
            }   
            return $cashvalue; 
        }

        public static function DisplayUserBank($bank){
            $bankvalue = "Nil";
            if((int)$bank > 0){ 
                $bankvalue = $bank;
                return "$ {$bankvalue}";  
            }    
            return $bankvalue; 
        }

        public static function DisplayGangBank($pid){
            $bankvalue = "Nil";
            if($usergang = Database::Query('SELECT * FROM gangs WHERE owner=:owner', array(':owner'=>$pid))[0]) {
                if((int)$usergang["bank"] > 0){
                    $bankvalue = $usergang['bank'];
                    return "${$bankvalue}";  
                }   
            }
            return $bankvalue; 
        }

        public static function DisplayLicenses($arma_string_array) { 

            if ($a === '"[]"' || $a === '') { 
                return array(); 
            }

            $licenses_available = array();  
            $licenses_unavailable = array(); 

            foreach (explode('],[', $arma_string_array) as $value) 
            {    
                $value = str_replace('`', '', $value);
                $value = str_replace('"[[', '', $value);
                $value = str_replace(']]"', '', $value);  
                $explode = explode(',', $value);  

                $innerexplode = explode('_', $explode[0]);  
                $innerexplode[0] = strtolower($innerexplode[0]);
                $innerexplode[1] = strtolower($innerexplode[1]);
                $innerexplode[2] = ucfirst($innerexplode[2]); 

                if($innerexplode[0] == "license"){ 
                    if($innerexplode[1] == "civ" || $innerexplode[1] == "cop" || $innerexplode[1] == "med"){
                        $license = array();  
                        array_push($license, $innerexplode[2]); 
                        array_push($license, $explode[1]);  
                        if($explode[1] !== 1){
                            array_push($licenses_available, $license);  
                        }else{
                            array_push($licenses_unavailable, $license);     
                        } 
                    }
                } 
            }  
            return array_merge($licenses_unavailable,$licenses_available);
        }
    }        
?>

