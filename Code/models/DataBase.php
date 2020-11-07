<?php 

class DataBase{

 

    public static function conectar()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=aseomatic;charset:utf8','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die('Error De DataBase'.$e->getMessage());
        }
    }
}