<?php

class Noticia extends DataBase{
    public function allNews()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM noticias INNER JOIN usuarios ON noticias.fk_usuario=usuarios.id_usuario ORDER BY titulo_noticia");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio AllUsers'.$e->getMessage());
        }
    }

     

    public function storeAddNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$imgNew,$newUser)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO noticias(titulo_noticia,descripcion_noticia,fecha_publicado,imagen_noticia,fk_usuario) VALUES(?,?,?,?,?)");
            $stm->bindParam(1,$tituloNoticia,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionNoticia,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$imgNew,PDO::PARAM_STR);
            $stm->bindParam(5,$newUser,PDO::PARAM_STR);
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }


    public function updateNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$imgNew,$fkUser,$idNoticia)
    {
        try {
            $stm =parent::conectar()->prepare("UPDATE noticias SET titulo_noticia= ?, descripcion_noticia=? ,fecha_publicado=?,imagen_noticia=?,fk_usuario=? WHERE id_noticia = ?");
            $stm->bindParam(1,$tituloNoticia,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionNoticia,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$imgNew,PDO::PARAM_STR);
            $stm->bindParam(5,$fkUser,PDO::PARAM_INT);
            $stm->bindParam(6,$idNoticia,PDO::PARAM_INT);
            $stm->execute();

        } catch (Exception $e) {
            die('Error UpdateNew'.$e->getMessage());
        }
    }

    public function deleteNew($id)
    {
        try {
            $stm = parent::conectar()->prepare("DELETE FROM noticias WHERE id_noticia= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }

    public function showImg($id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT imagen_noticia FROM noticias WHERE id_noticia= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }
    
}