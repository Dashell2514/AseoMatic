<?php

class Evento extends DataBase
{
    public function allEvent()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT n.id id_evento,
            n.title titulo_evento,
            n.description descripcion_evento,
            n.updated_at fecha_publicado,
            n.image imagen_evento,
            n.user_id fk_usuario,
            us.name nombres,
            us.lastname apellidos
            FROM events n INNER JOIN users us ON n.user_id=us.id ORDER BY n.updated_at");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio AllUsers'.$e->getMessage());
        }
    }


    public function storeAddEvent($tituloEvento,$descripcionEvento,$fechaPublicacion,$fechaActualizacion,$imgEvent,$EventUser)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO events(title,description,created_at,updated_at,image,user_id) VALUES(?,?,?,?,?,?)");
            $stm->bindParam(1,$tituloEvento,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionEvento,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$fechaActualizacion,PDO::PARAM_STR);
            $stm->bindParam(5,$imgEvent,PDO::PARAM_STR);
            $stm->bindParam(6,$EventUser,PDO::PARAM_STR);
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }

    public function updateEvent($tituloEvento,$descripcionEvento,$fechaPublicacion,$imgEvent,$fkUser,$idEvento)
    {
        try {
            $stm =parent::conectar()->prepare("UPDATE events SET title= ?, description=? ,updated_at=?,image=?,user_id=? WHERE id = ?");
            $stm->bindParam(1,$tituloEvento,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionEvento,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$imgEvent,PDO::PARAM_STR);
            $stm->bindParam(5,$fkUser,PDO::PARAM_INT);
            $stm->bindParam(6,$idEvento,PDO::PARAM_INT);
            $stm->execute();

        } catch (Exception $e) {
            die('Error UpdateNew'.$e->getMessage());
        }
    }

    public function showImgEvent($id)
    {
        try {
            $stm = parent::conectar()->prepare("SELECT e.image imagen_evento FROM events e WHERE id= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Murio DeleteNew'.$e->getMessage());
        }
    }

    public function deletEvent($id)
    {
        try {
            $stm = parent::conectar()->prepare("DELETE FROM events WHERE id= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeletEvent'.$e->getMessage());
        }
    }
    
}