<?php 

class DataBase{

    public static function conectar()
    {
        try {
            $conectionString = "mysql:host=".ConfigurationClient::DB_HOST.";dbname=".ConfigurationClient::DB_DATABASE.';charset='.ConfigurationClient::DB_CHARSET.';port='.ConfigurationClient::DB_PORT.';';
            
            $pdo = new PDO($conectionString, ConfigurationClient::DB_USER, ConfigurationClient::DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die('Error De DataBase'.$e->getMessage());
        }
    }
}