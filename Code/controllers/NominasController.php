<?php 


class NominasController extends Nomina{

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
        $title='Nomina';
        require_once('views/administrador/nomina.php');
    }


    //? trae la informacion en formato JSON
    public function allNewsJson()
    {
        echo parent::consultarNominas();
    }

    public function store(){
        $id_usuario = $_POST['id_usuario'];
        $dateFrom = $_POST['date_from'];
        $dateTo = $_POST['date_to'];
        $concept = $_POST['concept'];
        $time = $_POST['time'];
        $pay = $_POST['pay'];

        if($id_usuario != '' && $dateFrom != '' && $dateTo != '' && $concept != '' && $time != '' && $pay != ''){
        parent::createNomina($id_usuario, $dateFrom, $dateTo);
        parent::createConcept($concept, $time, $pay);
        header('location:?class=Nominas&view=index');
        }else{

            echo json_encode(['error'=> 'Debes llenar todos los campos']);
        }

    }

    public function update()
    {
        $id_usuario = $_POST['id_usuario'];
        $id_nomina = $_POST['id_nomina'];
        $id_concepto = $_POST['id_concepto'];
        $dateFrom = $_POST['date_from'];
        $dateTo = $_POST['date_to'];
        $concept = $_POST['concept'];
        $time = $_POST['time'];
        $pay = $_POST['pay'];

        if($id_usuario != '' && $dateFrom != '' && $dateTo != '' && $concept != '' && $time != '' && $pay != ''){

        parent::updateNomina($id_usuario, $dateFrom, $dateTo, $id_nomina);
        parent::updateConcept($concept, $time, $pay, $id_concepto);
        header('location:?class=Nominas&view=index');
        }else{
            echo json_encode(['error'=> 'Debes llenar todos los campos']);
        }
    }



    public function destroy(){
        $id_nomina=$_POST['id'];

        parent::deleteNomina($id_nomina);
        header('location:?class=Nominas&view=index');

    }




  


}