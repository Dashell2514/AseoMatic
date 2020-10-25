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

    static public function allTableId($tabla,$campo,$tipo,$id)
    {
        try {
            // $stm = parent::conectar()->prepare("SELECT titulo_evento, descripcion_evento,fecha_publicado, imagen_evento, fk_usuario FROM $tabla WHERE $campo=? ");

            $stm = parent::conectar()->prepare("SELECT titulo_$tipo, descripcion_$tipo,fecha_publicado, imagen_$tipo,nombres,apellidos FROM $tabla  INNER JOIN usuarios on  $tabla.fk_usuario=usuarios.id_usuario WHERE $campo=? ");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
    }

}