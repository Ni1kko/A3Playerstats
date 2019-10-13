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
}
