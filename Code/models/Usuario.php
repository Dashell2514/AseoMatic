<?php

class Usuario extends DataBase{

    public function allUsers()
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
            roles.id id_rol,
            roles.name nombre_rol
            FROM users us
            INNER JOIN roles ON us.role_id=roles.id ORDER BY us.id");
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
            $stm = parent::conectar()->prepare("SELECT us.id id_usuario,
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
            us.token 
            FROM users us WHERE us.id=? AND us.token=?");
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
            $stm = parent::conectar()->prepare("SELECT us.image img_usuario FROM users us WHERE us.id= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }

    static function showImgUserStatic($id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT us.image img_usuario FROM users us WHERE us.id= ?");
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

            $stm = parent::conectar()->prepare("INSERT INTO users(name, lastname, email,salary, password, image, document_number, role_id, charges_id, document_type_id, contract_type_id, token, created_at, updated_at)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,CURRENT_TIME(),CURRENT_TIME())");
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
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }

    public function UpdateUser($nombres,$apellidos,$correo,$salario,$clave,$img_usuario,$numero_documento,$fk_rol,$fk_cargo,$fk_tipo_documento,$fk_tipo_contrato,$token,$updated_at,$id)
    {
        try {
            $stm = parent::conectar()->prepare("UPDATE users SET name=? ,lastname=? ,email=?,salary=?,password=?,image = ?,document_number=?,role_id=?,charges_id=?,document_type_id=?,contract_type_id=?,token =?,updated_at=? WHERE id = ?");
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
            $stm = parent::conectar()->prepare("DELETE FROM users WHERE id= ?  AND token = ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->bindParam(2,$token,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeleteUser'.$e->getMessage());
        }
    }

    public function consultarUltimoUsuario(){
        try{
            $str = parent::conectar()->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
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


    public static function emailLog($nombreContact,$apellidoContact,$correoContact,$asuntoContact,$mensajeContact,$fecha_envio)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO `logs_contact`(`name`, `lastname`, `email`, `subject`, `message`, `send_date`) VALUES (?,?,?,?,?,?)");
            $stm->bindParam(1,$nombreContact,PDO::PARAM_STR);
            $stm->bindParam(2,$apellidoContact,PDO::PARAM_STR);
            $stm->bindParam(3,$correoContact,PDO::PARAM_STR);
            $stm->bindParam(4,$asuntoContact,PDO::PARAM_STR);
            $stm->bindParam(5,$mensajeContact,PDO::PARAM_STR);
            $stm->bindParam(6,$fecha_envio,PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
   
    }


    public static function usersId()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT id FROM users ORDER BY id ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio allTable'.$e->getMessage());
        }
    }




    
}