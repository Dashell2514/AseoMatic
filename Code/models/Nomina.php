<?php

class Nomina extends DataBase{

    public function createNomina($id_usuario, $dateFrom, $dateTo){
        try{
            $str = parent::conectar()->prepare("INSERT INTO nominas(fk_usuario, fecha_de, fecha_hasta) VALUES (?,?,?) ");
            $str->bindParam(1,$id_usuario,PDO::PARAM_INT);
            $str->bindParam(2,$dateFrom,PDO::PARAM_STR);
            $str->bindParam(3,$dateTo,PDO::PARAM_STR);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function createConcept($concept, $time, $pay){
        try{
            $str = parent::conectar()->prepare("INSERT INTO conceptos(concepto, horas, pago) VALUES (?,?,?) ");
            $str->bindParam(1,$concept,PDO::PARAM_STR);
            $str->bindParam(2,$time,PDO::PARAM_STR);
            $str->bindParam(3,$pay,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }   

    public function consultarNominas(){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarUnaNomina($id_nomina){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas WHERE id_nomina = $id_nomina");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarNominasPorUsuario($fk_usuario){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas WHERE fk_usuario = $fk_usuario");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function deleteNomina($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM nominas WHERE id_nomina = $id");
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function updateNomina($id_usuario, $dateFrom, $dateTo, $id_nomina){
        try{
            $str = parent::conectar()->prepare("UPDATE nominas SET fk_usuario = ?, fecha_de = ?, fecha_hasta = ? WHERE id_nomina = ?");
            $str->bindParam(1,$id_usuario,PDO::PARAM_INT);
            $str->bindParam(2,$dateFrom,PDO::PARAM_STR);
            $str->bindParam(3,$dateTo,PDO::PARAM_STR);            
            $str->bindParam(4,$id_nomina,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function updateConcept($concept, $time, $pay, $id_concepto){
        try{
            $str = parent::conectar()->prepare("UPDATE nominas SET concepto = ?, horas = ?, pago = ? WHERE id_concepto = ?");
            $str->bindParam(1,$concept,PDO::PARAM_STR);
            $str->bindParam(2,$time,PDO::PARAM_STR);
            $str->bindParam(3,$pay,PDO::PARAM_INT);            
            $str->bindParam(4,$id_concepto,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

}