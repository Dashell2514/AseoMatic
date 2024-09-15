<?php 



class DataBase{

    public static function conectar()
    {
       
        try {
           
            $conectionString = "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_DATABASE'].';charset='.$_ENV['DB_CHARSET'].';port='.$_ENV['DB_PORT'].';';
            
            $pdo = new PDO($conectionString, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die('Error De DataBase'.$e->getMessage());
        }
    }
}