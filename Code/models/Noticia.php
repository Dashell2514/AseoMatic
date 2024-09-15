<?php

class Noticia extends DataBase{
    public function allNews()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT n.id id_noticia,
            n.title titulo_noticia,
            n.description descripcion_noticia,
            n.updated_at fecha_publicado,
            n.image imagen_noticia,
            n.user_id fk_usuario,
            us.name nombres,
            us.lastname apellidos
            FROM news n INNER JOIN users us ON n.user_id=us.id ORDER BY n.title");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio AllUsers'.$e->getMessage());
        }
    }

     

    public function storeAddNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$fechaActualizacion,$imgNew,$newUser)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO news(title,description,created_at,updated_at,image,user_id) VALUES(?,?,?,?,?,?)");
            $stm->bindParam(1,$tituloNoticia,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionNoticia,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$fechaActualizacion,PDO::PARAM_STR);
            $stm->bindParam(5,$imgNew,PDO::PARAM_STR);
            $stm->bindParam(6,$newUser,PDO::PARAM_STR);
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }


    public function updateNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$imgNew,$fkUser,$idNoticia)
    {
        try {
            $stm =parent::conectar()->prepare("UPDATE news SET title= ?, description=? ,updated_at=? ,image=?,user_id=? WHERE id = ?");
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
            $stm = parent::conectar()->prepare("DELETE FROM news WHERE id= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }

    public function showImg($id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT n.image imagen_noticia FROM news n WHERE id= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }
    
}