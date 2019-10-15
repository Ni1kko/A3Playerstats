<?php
    class Database { 
        
        private static function Connect() {  
            $db = json_decode(file_get_contents("config.json"))->database;     
            $pdo = new PDO("mysql:host=$db->host;dbname=$db->dbname;charset=utf8", $db->user, $db->password); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public static function Query($query, $queryparams = array()) {
            $statement = self::Connect()->prepare($query);
            $statement->execute($queryparams);

            if (explode(' ', $query)[0] == 'SELECT') { 
                return $statement->fetchAll();
            }
        } 

        public static function ParseA3String($stringArray){
            $objects = array(); 
            if ($stringArray !== '"[]"' || $stringArray !== '') { 
                foreach (explode('],[', $stringArray) as $value) 
                {    
                    $value = str_replace('`', '', $value);
                    $value = str_replace('"[[', '', $value);
                    $value = str_replace(']]"', '', $value);  
                    $explode = explode(',', $value);  
                    array_push($objects, $explode);   
                } 
            } 
            return $objects;   
        }

        public static function AllPlayers(){ 
            if($players = self::Query('SELECT * FROM players')){ 
                return $players;
            } 
            return array();
        }

        public static function AllCivilians(){
            if($civilians = self::Query('SELECT * FROM players WHERE coplevel="0" AND mediclevel="0"')){ 
                return $civilians;
            } 
            return array();
        }

        public static function AllMedics(){
            if($medics = self::Query('SELECT * FROM players WHERE NOT mediclevel="0"')){ 
                return $medics;
            } 
            return array();
        }

        public static function AllPolice(){
            if($police = self::Query('SELECT * FROM players WHERE NOT coplevel="0"')){ 
                return $police;
            } 
            return array();
        }

        public static function AllGangs(){ 
            if($gangs = self::Query('SELECT * FROM gangs')){ 
                return $gangs;
            } 
            return array();
        }

        public static function UserGangs($pid){ 
            $gangs = array();

            if($gang_result = self::Query('SELECT * FROM gangs WHERE active="1" AND owner=:owner', array(':owner'=>$pid))[0]) {
                array_push($gangs, $gang_result);
            }

            if($gang_result2 = self::Query('SELECT * FROM gangs WHERE active="1" AND members LIKE :member AND owner <> :owner', array(':member'=> '%"'.$pid.'"%',':owner'=>$pid))[0]){
                array_push($gangs, $gang_result2);
            } 
 
            return $gangs;
        }

        public static function GangBank($pid){ 
            $gangbank = 0;
            if($user_gangs = self::UserGangs($pid)) {
                foreach($user_gangs as $user_gang){
                    if($user_gang['bank'] > $gangbank){
                        $gangbank = $user_gang['bank'];
                    } 
                } 
            } 
            return $gangbank;
        }

        public static function GangName($pid){ 
            $gangname = ""; 
            $gangs_state = array();
            if($user_gangs = self::UserGangs($pid)) {
                foreach($user_gangs as $user_gang){   
                    $gangname = $user_gang['name']; 
                    if ($user_gang['owner'] == 1) {
                        break;
                    }
                } 
            } 
            return $gangname;
        }
            
    }
?>