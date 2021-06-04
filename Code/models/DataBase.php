<?php 

class DataBase{

    private const DB_HOST = 'localhost';
    private const DB_DATABASE = 'aseomatic';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_CHARSET = 'charset:utf8';

    public static function conectar()
    {
        try {
            $conectionString = "mysql:host=".self::DB_HOST.";dbname=".self::DB_DATABASE.';'.self::DB_CHARSET.';';
            $pdo = new PDO($conectionString, self::DB_USER, self::DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die('Error De DataBase'.$e->getMessage());
        }
    }
}