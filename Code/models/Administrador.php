<?php

class Administrador extends DataBase
{

    static public function allTable($tabla)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM $tabla");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
    }

    static public function allTableId($tabla,$id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT n.title, n.description, n.updated_at, n.image,us.name,us.lastname FROM $tabla n INNER JOIN users us on  n.user_id=us.id WHERE n.id=? ");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
    }

}