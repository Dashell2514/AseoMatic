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
        $moduloJs = '<script src="assets/js/modulos/payrolls/payrolls.js" type="module"></script>';
        require_once('views/administrador/nomina.php');
    }


    //? trae la informacion en formato JSON
    public function allNominasJson()
    {
        echo json_encode(parent::consultarTodasLasNominas()); 
    }

    public function showConceptsID()
    {
        echo json_encode(Nomina::consultarConceptosPorNomina($_REQUEST['id']));
    }

    public function store(){
        $fk_usuario = $_POST['fk_usuario'];
        $fecha_de = $_POST['fecha_de'];
        $fecha_hasta = $_POST['fecha_hasta'];
        $arrayDatos = json_decode($_POST['arrayDatos']);
    

        if($fk_usuario && $fecha_de && $fecha_hasta && $arrayDatos){

            parent::createNomina($fk_usuario, $fecha_de, $fecha_hasta);

            $lastNomina = parent::consultarUltimaNomina();
            
            $total = 0;
            for ($i=0; $i < count($arrayDatos); $i++) { 
                $data = $arrayDatos[$i];
                parent::createConcept($data->descripcion, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $lastNomina->id_nomina);

                if($data->fk_asiento_contable == 2)
                {
                    $total -=$data->valor;

                }else{
                    $total +=$data->valor;
                }
            }
            

            parent::updateNominaValor($total,$lastNomina->id_nomina);
            echo json_encode(['ok'=> 'Creado']);
            return;
        }else{

            echo json_encode(['error'=> 'Debes llenar todos los campos']);
            return;
        }

    }

    public function update()
    {
        $arrayDatos = json_decode($_POST['arrayDatos']);
        $fk_nomina = ($_POST['fk_nomina']);
    

        if($fk_nomina && $arrayDatos){
            
            parent::deleteTodosConceptos($fk_nomina);
            $total = 0;
            for ($i=0; $i < count($arrayDatos); $i++) { 
                $data = $arrayDatos[$i];
      
                parent::createConcept($data->descripcion, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $fk_nomina);

                if($data->fk_asiento_contable == 2)
                {
                    $total -=$data->valor;

                }else{
                    $total +=$data->valor;
                }
               
            }
            
            parent::updateNominaValor($total,$fk_nomina);
            echo json_encode(['ok'=> 'Creado']);
            return;
        }else{

            echo json_encode(['error'=> 'Debes llenar todos los campos']);
            return;
        }
    }

   



    public function destroy(){
        $id_nomina=$_POST['id'];

        parent::deleteNomina($id_nomina);
        header('location:?class=Nominas&view=index');

    }




  


}