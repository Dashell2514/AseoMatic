<?php

class Nomina extends DataBase{
    public function createNomina($id_usuario, $dateFrom, $dateTo){
        try{
            $str = parent::conectar()->prepare("INSERT INTO payrolls(user_id, initial_date, final_date)
            VALUES (?,?,?) ");
            $str->bindParam(1,$id_usuario,PDO::PARAM_INT);
            $str->bindParam(2,$dateFrom,PDO::PARAM_STR);
            $str->bindParam(3,$dateTo,PDO::PARAM_STR);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function createConcept($descripcion,$estado, $fk_asiento_contable, $valor, $fk_tipo_concepto, $fk_nomina){
        try{
            $str = parent::conectar()->prepare("INSERT INTO concepts(description, status, accounting_entry_id, value, concepts_id, payroll_id) VALUES (?,?,?,?,?,?) ");
            $str->bindParam(1,$descripcion,PDO::PARAM_STR);
            $str->bindParam(2,$estado,PDO::PARAM_INT);
            $str->bindParam(3,$fk_asiento_contable,PDO::PARAM_STR);
            $str->bindParam(4,$valor,PDO::PARAM_STR);
            $str->bindParam(5,$fk_tipo_concepto,PDO::PARAM_INT);
            $str->bindParam(6,$fk_nomina,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }   



    public function consultarNominas(){
        try{
            $str = parent::conectar()->prepare("SELECT 
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id,
            p.salary valor
            FROM payrolls p");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarUltimaNomina(){
        try{
            $str = parent::conectar()->prepare("SELECT   
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id,
            p.salary valor
            FROM payrolls p ORDER BY id DESC LIMIT 1");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function consultarTodasLasNominas(){
        try{
            $str = parent::conectar()->prepare("SELECT 
            us.id id_usuario,
            us.name nombres,
            us.lastname apellidos,
            us.document_number numero_documento,
            us.salary salario,
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id fk_usuario,
            p.salary valor
            FROM payrolls p LEFT JOIN users us ON us.id = p.user_id  WHERE p.status=1 GROUP BY p.id ORDER BY p.initial_date DESC");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }

    }

    public function consultarTodasLasNominasPorUsuario($id_usuario){
        try{
            $str = parent::conectar()->prepare("SELECT 
            us.id id_usuario,
            us.name nombres,
            us.lastname apellidos,
            us.document_number numero_documento,
            us.salary salario,
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id fk_usuario,
            p.salary valor,
            c.id id_concepto,
            c.description descripcion,
            c.status estado,
            c.value valor,
            c.concepts_id fk_tipo_concepto,
            c.payroll_id fk_nomina,
            c.accounting_entry_id fk_asiento_contable
            FROM payrolls p  LEFT JOIN concepts c ON c.payroll_id= p.id LEFT JOIN users us ON us.id = p.user_id WHERE us.id = ? GROUP BY p.initial_date ORDER BY p.initial_date DESC");
            $str->bindParam(1,$id_usuario,PDO::PARAM_INT);
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static function consultarConceptosPorNomina($id_nomina){
        try{
            $str = parent::conectar()->prepare("SELECT
            c.id id_concepto,
            c.description descripcion,
            c.status estado,
            c.value valor,
            c.concepts_id fk_tipo_concepto,
            c.payroll_id fk_nomina,
            c.accounting_entry_id fk_asiento_contable,
            t.id id_tipo_concepto,
            t.name tipo_concepto,
            ac.id id_asiento_contable,
            ac.name asiento_contable          
            FROM concepts c LEFT JOIN types_concepts t ON c.concepts_id = t.id LEFT JOIN accounting_entry ac ON c.accounting_entry_id = ac.id WHERE c.payroll_id = $id_nomina  ORDER BY c.id DESC");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static function consultarUnaNomina($id_nomina){
        try{
            $str = parent::conectar()->prepare("SELECT
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id fk_usuario,
            p.salary valor,
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
            us.created_at,
            us.updated_at,
            c.id id_cargo,
            c.name nombre_cargo
            FROM payrolls p LEFT JOIN users us ON us.id = p.user_id LEFT JOIN charges c ON c.id=us.charges_id  WHERE p.id = $id_nomina");
            $str->execute();
            return $str->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public static  function consultarNominasPorUsuario($fk_usuario){
        try{
            $str = parent::conectar()->prepare("SELECT
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id fk_usuario,
            p.salary valor,
            us.id id_usuario
            FROM payrolls p LEFT JOIN concepts c ON c.payroll_id= p.id LEFT JOIN users us ON us.id= p.user_id WHERE p.user_id = $fk_usuario AND p.status=1 GROUP BY p.id ORDER BY p.id DESC");
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function deleteNomina($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM payrolls WHERE id = $id");
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function deleteTodosConceptos($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM concepts WHERE payroll_id = $id");
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function deleteConcepto($id){
        try{
            $str = parent::conectar()->prepare("DELETE FROM concepts WHERE id = $id");
            $str->execute();
        }catch(Exception $e){
            die('mal'.$e->getMessage());
        }
    }

    public function updateNomina($id_usuario, $dateFrom, $dateTo, $id_nomina){
        try{
            $str = parent::conectar()->prepare("UPDATE payrolls SET user_id = ?, initial_date = ?, final_date = ? WHERE id = ?");
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
            $str = parent::conectar()->prepare("UPDATE payrolls SET salary = ? WHERE id = ?");
            $str->bindParam(1,$valor,PDO::PARAM_INT);
            $str->bindParam(2,$id_nomina,PDO::PARAM_INT);
            $str->execute();
        }catch(Exception $e){
            die('Fallo valor en nomina'.$e->getMessage());
        }
        
    }

    public function conceptosFijos($id)
    {  
        try{
            $str = parent::conectar()->prepare("SELECT 
            us.id id_usuario
            ,us.name nombre
            ,us.lastname apellidos
            ,us.salary salario
            ,con.id id_concepto
            ,con.description descripcion
            ,con.value valor
            ,con.status estado,
            con.concepts_id fk_tipo_concepto
            ,con.accounting_entry_id fk_asiento_contable 
            ,tc.name tipo_concepto,
            p.id id_nomina,
            p.initial_date fecha_de,
            p.final_date fecha_hasta,
            p.user_id,
            p.salary valorNomina,
            tc.id id_tipo_concepto,
            ae.id id_asiento_contable,
            ae.name asiento_contable
            from users us 
            LEFT JOIN payrolls p ON p.user_id = us.id 
            LEFT JOIN concepts con ON con.payroll_id = p.id
            LEFT JOIN types_concepts tc ON con.concepts_id = tc.id
            LEFT JOIN accounting_entry ae ON con.accounting_entry_id = ae.id
            where con.status = 2 AND us.id = ?
            group by 
            us.id 
            ,us.name 
            ,us.lastname 
            ,us.salary 
            ,con.value
            ,con.status
            ,tc.name");
            $str->bindParam(1,$id,PDO::PARAM_INT);
            $str->execute();
            return $str->fetchAll(PDO::FETCH_OBJ); 
        }catch(Exception $e){
            die('Fallo valor en nomina'.$e->getMessage());
        }
        
    }

}