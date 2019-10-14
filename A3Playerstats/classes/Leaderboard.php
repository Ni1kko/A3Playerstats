<?php 
    class Leaderboard { 
        
        public static function DisplayTopCivilians($civilians, $amount = 100){
            
            $top_civilians = array(); 

            function civilian_compare($a, $b)
            {
                $x = $a["bankacc"] + $a["cash"];
                $y = $b["bankacc"] + $b["cash"];
                if ($x == $y) { return 0; }
                return ($x < $y) ? 1 : -1;
            }
    
            usort($civilians, "civilian_compare");

            if (count($civilians) >= $amount) {
                $top_civilians = array_slice($civilians, 0, $amount);
            } else {
                $top_civilians = $civilians; 
            }

            return $top_civilians; 
        }
    
        public static function DisplayTopMedics($medics, $amount = 100){
            
            $top_medics = array();
            
            function medic_compare($a, $b)
            {
                $x = $a["mediclevel"];
                $y = $b["mediclevel"];
                if ($x == $y) {
                    return 0;
                }
                return ($x < $y) ? 1 : -1;
            }
    
            usort($medics, "medic_compare");

            if (count($medics) >= $amount) {
                $top_medics = array_slice($medics, 0, $amount);
            } else {
                $top_medics = $medics; 
            }

            return $top_medics; 
        }
    
        public static function DisplayTopPolice($police, $amount = 100){
            
            $top_police = array(); 

            function police_compare($a, $b)
            {
                $x = $a["coplevel"];
                $y = $b["coplevel"];
                if ($x == $y) {
                    return 0;
                }
                return ($x < $y) ? 1 : -1;
            }
    
            usort($police, "police_compare");

            if (count($police) >= $amount) {
                $top_police = array_slice($police, 0, $amount);
            } else {
                $top_police = $police; 
            }

            return $top_police; 
        } 
    }         
?>

