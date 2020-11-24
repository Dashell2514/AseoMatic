<?php

class Usuario extends DataBase{

    public function allUsers()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM usuarios INNER JOIN roles ON usuarios.fk_rol=roles.id_rol ORDER BY id_usuario");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio AllUsers'.$e->getMessage());
        }
    }

    public function showUser($id,$token)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM usuarios WHERE id_usuario = ? AND token = ? ");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->bindParam(2,$token,PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio ShowUser'.$e->getMessage());
        }
    }

    
    public function showImgUser($id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT img_usuario FROM usuarios WHERE id_usuario= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }

    public function storeUser($nombres,$apellidos,$correo,$salario,$clave,$img_usuario,$numero_documento,$fk_rol,$fk_cargo,$fk_tipo_documento,$fk_tipo_contrato,$token)
    {
        try {

            $stm = parent::conectar()->prepare("INSERT INTO usuarios(nombres, apellidos, correo,salario, clave, img_usuario, numero_documento, fk_rol, fk_cargo, fk_tipo_documento, fk_tipo_contrato, token, created_at, updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,CURRENT_TIME(),CURRENT_TIME())");
            $stm->bindParam(1,$nombres,PDO::PARAM_STR);
            $stm->bindParam(2,$apellidos,PDO::PARAM_STR);
            $stm->bindParam(3,$correo,PDO::PARAM_STR);
            $stm->bindParam(4,$salario,PDO::PARAM_STR);
            $stm->bindParam(5,$clave,PDO::PARAM_STR);
            $stm->bindParam(6,$img_usuario,PDO::PARAM_STR);
            $stm->bindParam(7,$numero_documento,PDO::PARAM_STR);
            $stm->bindParam(8,$fk_rol,PDO::PARAM_INT);
            $stm->bindParam(9,$fk_cargo,PDO::PARAM_INT);
            $stm->bindParam(10,$fk_tipo_documento,PDO::PARAM_INT);
            $stm->bindParam(11,$fk_tipo_contrato,PDO::PARAM_INT);
            $stm->bindParam(12,$token,PDO::PARAM_INT);
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }

    public function UpdateUser($nombres,$apellidos,$correo,$salario,$clave,$img_usuario,$numero_documento,$fk_rol,$fk_cargo,$fk_tipo_documento,$fk_tipo_contrato,$token,$updated_at,$id)
    {
        try {
            $stm = parent::conectar()->prepare("UPDATE usuarios SET nombres=? ,apellidos=? ,correo=?,salario=?,clave=?,img_usuario = ?,numero_documento=?,fk_rol=?,fk_cargo=?,fk_tipo_documento=?,fk_tipo_contrato=?,token =?,updated_at=? WHERE id_usuario = ?");
            $stm->bindParam(1,$nombres,PDO::PARAM_STR);
            $stm->bindParam(2,$apellidos,PDO::PARAM_STR);
            $stm->bindParam(3,$correo,PDO::PARAM_STR);
            $stm->bindParam(4,$salario,PDO::PARAM_STR);
            $stm->bindParam(5,$clave,PDO::PARAM_STR);
            $stm->bindParam(6,$img_usuario,PDO::PARAM_STR);
            $stm->bindParam(7,$numero_documento,PDO::PARAM_STR);
            $stm->bindParam(8,$fk_rol,PDO::PARAM_INT);
            $stm->bindParam(9,$fk_cargo,PDO::PARAM_INT);
            $stm->bindParam(10,$fk_tipo_documento,PDO::PARAM_INT);
            $stm->bindParam(11,$fk_tipo_contrato,PDO::PARAM_INT);
            $stm->bindParam(12,$token,PDO::PARAM_STR);
            $stm->bindParam(13,$updated_at,PDO::PARAM_STR);
            $stm->bindParam(14,$id,PDO::PARAM_INT);
            $stm->execute();    
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }

    public function deleteUser($id,$token)
    {
        try {
            $stm = parent::conectar()->prepare("DELETE FROM usuarios WHERE id_usuario= ?  AND token = ? ");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->bindParam(2,$token,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeleteUser'.$e->getMessage());
        }
    }

    public function allTable($tabla)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM $tabla");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
    }


    public static function emailLog($nombreContact,$apellidoContact,$generoContact,$correoContact,$asuntoContact,$mensajeContact,$fecha_envio)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO `logs_contactenos` (`nombres_contactenos`, `apellidos_contactenos`, `genero_contactenos`, `correo_contactenos`, `asunto_contactenos`, `mensaje_contactenos`, `fecha_envio`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
            $stm->bindParam(1,$nombreContact,PDO::PARAM_STR);
            $stm->bindParam(2,$apellidoContact,PDO::PARAM_STR);
            $stm->bindParam(3,$generoContact,PDO::PARAM_STR);
            $stm->bindParam(4,$correoContact,PDO::PARAM_STR);
            $stm->bindParam(5,$asuntoContact,PDO::PARAM_STR);
            $stm->bindParam(6,$mensajeContact,PDO::PARAM_STR);
            $stm->bindParam(7,$fecha_envio,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
   
    }

    
}