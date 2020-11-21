<?php

class Empleado extends DataBase
{
    public function showProfile($token)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM usuarios  WHERE token = ? ");
            $stm->bindParam(1,$token,PDO::PARAM_STR);
            $stm->execute();
            $result=$stm->fetch(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio ShowUser'.$e->getMessage());
        }
    }

    public function updateProfile($pass,$img,$updated_at,$token)
    {
        try {
            $stm = parent::conectar()->prepare("UPDATE usuarios  SET clave=?, img_usuario=? ,updated_at=? WHERE token = ?");
            $stm->bindParam(1,$pass,PDO::PARAM_STR);
            $stm->bindParam(2,$img,PDO::PARAM_STR);
            $stm->bindParam(3,$updated_at,PDO::PARAM_STR);
            $stm->bindParam(4,$token,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio ShowUser'.$e->getMessage());
        }
    }




}