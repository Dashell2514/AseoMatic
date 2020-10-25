<?php

class Login extends DataBase{
    public function verificarLogin($email)
    {
        try {
          
            $stm = parent::conectar()->prepare("SELECT nombres,apellidos,correo,fk_rol,clave,nombre_rol,img_usuario,numero_documento,fk_tipo_documento,tipo_documento,token FROM usuarios INNER JOIN roles ON usuarios.fk_rol= roles.id_rol INNER JOIN tipos_documentos ON usuarios.fk_tipo_documento=tipos_documentos.id_tipo_documento AND usuarios.correo=? ");
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