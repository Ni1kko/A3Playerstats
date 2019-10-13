<?php
class Database { 
     
    private static function Connect() { 
        //$pdo = new PDO("mysql:host=localhost;dbname=altislife;charset=utf8", "root", "Finlay131013");
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
