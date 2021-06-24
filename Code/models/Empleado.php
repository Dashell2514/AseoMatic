<?php

class Empleado extends DataBase
{
    public function showProfile($token)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT 
            us.id id_usuario,
            us.name nombres,
            us.lastname apellidos,
            us.email correo,
            us.salary salario,
            us.password clave,
            us.image img_usuario,
            us.document_number numero_documento,
            us.role_id fk_rol,
            us.charges_id fk_cargo,
            us.document_type_id fk_tipo_documento,
            us.contract_type_id fk_tipo_contrato,
            us.token,
            us.created_at,
            us.updated_at
            FROM users us  WHERE token = ? ");
            $stm->bindParam(1,$token,PDO::PARAM_STR);
            $stm->execute();
            $result=$stm->fetch(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio ShowUser'.$e->getMessage());
        }
    }

    public function updatePassword($pass,$updated_at,$token)
    {
        try {
            $stm = parent::conectar()->prepare("UPDATE users  SET password=?,updated_at=? WHERE token = ?");
            $stm->bindParam(1,$pass,PDO::PARAM_STR);
            $stm->bindParam(2,$updated_at,PDO::PARAM_STR);
            $stm->bindParam(3,$token,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio UpdatePass'.$e->getMessage());
        }
    }


    public function updateImg($img,$token)
    {
        try {
            $stm = parent::conectar()->prepare("UPDATE users SET image=?   WHERE token = ?");
            $stm->bindParam(1,$img,PDO::PARAM_STR);
            $stm->bindParam(2,$token,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio UpdateImg'.$e->getMessage());
        }
    }




}