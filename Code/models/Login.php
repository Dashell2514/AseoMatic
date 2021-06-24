<?php

class Login extends DataBase{
    public function verificarLogin($email)
    {
        try {
          
            $stm = parent::conectar()->prepare("SELECT 
            us.id id_usuario,
            us.name nombres,
            us.lastname apellidos,
            us.email correo,
            us.password clave,
            us.status estado,
            us.image img_usuario,
            us.document_number numero_documento,
            us.role_id fk_rol,
            us.charges_id fk_cargo,
            us.document_type_id fk_tipo_documento,
            us.contract_type_id fk_tipo_contrato,
            us.token,
            us.created_at,
            us.updated_at,
            roles.name nombre_rol,
            charges.name nombre_cargo
            FROM users us INNER JOIN roles ON us.role_id= roles.id INNER JOIN document_types ON us.document_type_id=document_types.id AND us.email=? INNER JOIN charges ON us.charges_id=charges.id");
            $stm->bindParam(1,$email,PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
    
        } catch (Exception $e) {
            die('Error Login F:'.$e->getMessage());
        }
    }

    static public function verificarSiExisteEmail($email)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT 
            us.email correo
            FROM users us WHERE us.email=?");
            $stm->bindParam(1 ,$email, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Error Login F:'.$e->getMessage());
        }
    }

    static public function verificarSiExisteEmailUpdate($email,$id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT 
            us.email correo
            FROM users us WHERE us.email= ? AND us.id=?");
            $stm->bindParam(1 ,$email, PDO::PARAM_STR);
            $stm->bindParam(2 ,$id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Error Login F:'.$e->getMessage());
        }
    }



    static public function limitar_cadena($texto, $largoTexto, $complementoTexto){
        if(strlen($texto) > $largoTexto){
            return substr($texto, 0, $largoTexto) . $complementoTexto;
        }
        return $texto;
    }



}