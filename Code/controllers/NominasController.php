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
        $fk_usuario = $_POST['fk_usuario'];
        $fecha_de = $_POST['fecha_de'];
        $fecha_hasta = $_POST['fecha_hasta'];
        $arrayDatos = json_decode($_POST['arrayDatos']);
    

        if($fk_usuario && $fecha_de && $fecha_hasta && $arrayDatos){

            parent::createNomina($fk_usuario, $fecha_de, $fecha_hasta);

            $lastNomina = parent::consultarUltimaNomina();
            
            for ($i=0; $i < count($arrayDatos); $i++) { 
                $data = $arrayDatos[$i];
                parent::createConcept($data->description, $data->fk_asientoContable, $data->valor, $data->fk_tipo_concepto, $lastNomina->id_nomina);
            }
            echo json_encode(['ok'=> 'Creado']);
            return;
        }else{

            echo json_encode(['error'=> 'Debes llenar todos los campos']);
            return;
        }

    }

    public function update()
    {
        $fk_usuario = $_POST['id_usuario'];
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