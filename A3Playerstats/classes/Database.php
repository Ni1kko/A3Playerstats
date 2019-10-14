<?php
    class Database { 
        
        private static function Connect() {  
            $database = json_decode(file_get_contents("config.json"))->database;     
            $pdo = new PDO("mysql:host=$database->host;dbname=$database->dbname;charset=utf8", $database->user, $database->password); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public static function Query($query, $params = array()) {
            $statement = self::Connect()->prepare($query);
            $statement->execute($params);

            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        } 

        public static function AllPlayers(){ 
            if($users = Database::Query('SELECT * FROM players')){ 
                return $users;
            } 
            return array();
        }

        public static function AllCivilians(){
            if($civilians = Database::Query('SELECT * FROM players WHERE coplevel="0" AND mediclevel="0"')){ 
                return $civilians;
            } 
            return array();
        }

        public static function AllMedics(){
            if($medics = Database::Query('SELECT * FROM players WHERE NOT mediclevel="0"')){ 
                return $medics;
            } 
            return array();
        }

        public static function AllPolice(){
            if($police = Database::Query('SELECT * FROM players WHERE NOT coplevel="0"')){ 
                return $police;
            } 
            return array();
        }
            
    }
?>