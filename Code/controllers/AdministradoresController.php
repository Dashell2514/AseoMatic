<?php 

class AdministradoresController extends Administrador{
    
    private $seguridad;

    public function __construct()
    {
        try
        {
            $this->seguridad = new Security();
            $this->seguridad->seguridadAdministrador();
        }catch(Exception $e)
        {
            die('Error de Instancia');
        }

    }

    public function index()
    {
        $title = 'Administrador';
        require_once 'views/administrador/index.php';
    }

  



}