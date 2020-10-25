<?php

class Evento extends DataBase
{
    public function allEvent()
    {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM eventos INNER JOIN usuarios ON eventos.fk_usuario=usuarios.id_usuario ORDER BY fecha_publicado");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return json_encode($result);
        } catch (Exception $e) {
            die('Murio AllUsers'.$e->getMessage());
        }
    }


    public function storeAddEvent($tituloEvento,$descripcionEvento,$fechaPublicacion,$imgEvent,$EventUser)
    {
        try {
            $stm = parent::conectar()->prepare("INSERT INTO eventos(titulo_evento,descripcion_evento,fecha_publicado,imagen_evento,fk_usuario) VALUES(?,?,?,?,?)");
            $stm->bindParam(1,$tituloEvento,PDO::PARAM_STR);
            $stm->bindParam(2,$descripcionEvento,PDO::PARAM_STR);
            $stm->bindParam(3,$fechaPublicacion,PDO::PARAM_STR);
            $stm->bindParam(4,$imgEvent,PDO::PARAM_STR);
            $stm->bindParam(5,$EventUser,PDO::PARAM_STR);
            $stm->execute();
            
        } catch (Exception $e) {
            die('Error StoreUser'.$e->getMessage());
        }
    }

    public function updateEvent($tituloEvento,$descripcionEvento,$fechaPublicacion,$imgEvent,$fkUser,$idEvento)
    {
        try {
            $stm =parent::conectar()->prepare("UPDATE eventos SET titulo_evento= ?, descripcion_evento=? ,fecha_publicado=?,imagen_evento=?,fk_usuario=? WHERE id_evento = ?");
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
            $stm = parent::conectar()->prepare("SELECT imagen_evento FROM eventos WHERE id_evento= ?");
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
            $stm = parent::conectar()->prepare("DELETE FROM eventos WHERE id_evento= ?");
            $stm->bindParam(1,$id,PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die('Murio DeletEvent'.$e->getMessage());
        }
    }
    
}