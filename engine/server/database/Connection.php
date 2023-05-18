<?php
    class Connection{

        private static $hostname = "127.0.0.1";
        private static $dbname = "volandia";
        private static $user = "root";
        private static $pass = "";

        public function createConnection(){
            try{
                $conn = new PDO("mysql:host=".static::$hostname.";dbname=".static::$dbname, static::$user, static::$pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "error -> {$e -> getMessage()}";
                die();
            }
            return $conn;
        }

    }
?>