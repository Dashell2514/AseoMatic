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

    public function createConcept($descripcion, $fk_asiento_contable, $valor, $fk_tipo_concepto, $fk_nomina){
        try{
            $str = parent::conectar()->prepare("INSERT INTO conceptos(descripcion, fk_asiento_contable, valor, fk_tipo_concepto, fk_nomina) VALUES (?,?,?,?,?) ");
            $str->bindParam(1,$descripcion,PDO::PARAM_STR);
            $str->bindParam(2,$fk_asiento_contable,PDO::PARAM_STR);
            $str->bindParam(3,$valor,PDO::PARAM_STR);
            $str->bindParam(4,$fk_tipo_concepto,PDO::PARAM_INT);
            $str->bindParam(5,$fk_nomina,PDO::PARAM_INT);
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

    public function consultarUltimaNomina(){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas ORDER BY id_nomina DESC LIMIT 1");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarTodasLasNominas(){
        try{
            $str = parent::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombres, usuarios.apellidos, usuarios.numero_documento, usuarios.salario, nominas.* FROM nominas LEFT JOIN usuarios ON usuarios.id_usuario = nominas.fk_usuario GROUP BY nominas.id_nomina ORDER BY nominas.fecha_de DESC");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }

    }

    public function consultarTodasLasNominasPorUsuario($id_usuario){
        try{
            $str = parent::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombres, usuarios.apellidos, usuarios.numero_documento, usuarios.salario, nominas.*, conceptos.* FROM nominas  LEFT JOIN conceptos ON conceptos.fk_nomina = nominas.id_nomina LEFT JOIN usuarios ON usuarios.id_usuario = nominas.fk_usuario WHERE usuarios.id_usuario = ? GROUP BY nominas.fecha_de ORDER BY nominas.fecha_de DESC");
            $str->bindParam(1,$id_usuario,PDO::PARAM_INT);
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static function consultarConceptosPorNomina($id_nomina){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM conceptos LEFT JOIN tipo_concepto ON conceptos.fk_tipo_concepto = tipo_concepto.id_tipo_concepto LEFT JOIN asiento_contable ON conceptos.fk_asiento_contable = asiento_contable.id_asiento_contable WHERE fk_nomina = $id_nomina ORDER BY id_concepto DESC");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static function consultarUnaNomina($id_nomina){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas LEFT JOIN usuarios ON usuarios.id_usuario = nominas.fk_usuario LEFT JOIN cargos ON cargos.id_cargo=usuarios.fk_cargo  WHERE id_nomina = $id_nomina ");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static  function consultarNominasPorUsuario($fk_usuario){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM nominas LEFT JOIN conceptos ON conceptos.fk_nomina = nominas.id_nomina LEFT JOIN usuarios ON usuarios.id_usuario = nominas.fk_usuario WHERE fk_usuario = $fk_usuario GROUP BY nominas.id_nomina ORDER BY nominas.id_nomina DESC");
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

    public function deleteTodosConceptos($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM conceptos WHERE fk_nomina = $id");
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function deleteConcepto($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM conceptos WHERE id_concepto = $id");
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

    public function updateNominaValor($valor,$id_nomina)
    {  
        try{
            $str = parent::conectar()->prepare("UPDATE nominas SET valor = ? WHERE nominas.id_nomina = ?");
            $str->bindParam(1,$valor,PDO::PARAM_INT);
            $str->bindParam(2,$id_nomina,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
        
    }

    public function updateConcept($descripcion, $asiento_contable, $valor, $fk_tipo_concepto, $fk_nomina, $id_concepto){
        try{
            $str = parent::conectar()->prepare("UPDATE conceptos descripcion = ?, asiento_contable = ?, valor = ?, fk_tipo_concepto = ?, fk_nomina = ?) WHERE id_concepto = ?");
            $str->bindParam(1,$descripcion,PDO::PARAM_STR);
            $str->bindParam(2,$asiento_contable,PDO::PARAM_STR);
            $str->bindParam(3,$valor,PDO::PARAM_STR);
            $str->bindParam(4,$fk_tipo_concepto,PDO::PARAM_INT);
            $str->bindParam(5,$fk_nomina,PDO::PARAM_INT);
            $str->bindParam(6,$id_concepto,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }

    }  

    // querys de otras tablas

    
    public function consultarAsientoContable(){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM asiento_contable");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarTipoConcepto(){
        try{
            $str = parent::conectar()->prepare("SELECT * FROM tipo_concepto");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

}