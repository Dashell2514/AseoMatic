<?php

class Login extends DataBase{
    public function verificarLogin($email)
    {
        try {
          
            $stm = parent::conectar()->prepare("SELECT id_usuario,nombres,apellidos,correo,clave,img_usuario,numero_documento,fk_rol,fk_cargo,fk_tipo_documento,fk_tipo_contrato,token,created_at,updated_at,nombre_rol,nombre_cargo FROM usuarios INNER JOIN roles ON usuarios.fk_rol= roles.id_rol INNER JOIN tipos_documentos ON usuarios.fk_tipo_documento=tipos_documentos.id_tipo_documento AND usuarios.correo=? INNER JOIN cargos ON usuarios.fk_cargo=cargos.id_cargo ");
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
            $stm = parent::conectar()->prepare("SELECT correo FROM usuarios WHERE correo= ? ");
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
            $stm = parent::conectar()->prepare("SELECT correo FROM usuarios WHERE correo= ? AND id_usuario=? ");
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