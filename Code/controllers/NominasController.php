<?php 


class NominasController extends Nomina{

    private $seguridad;

    public function __construct()
    {
        try
        {
            $this->seguridad = new Security();
            $this->seguridad->seguridadAmbos();
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
            
            for ($i=0; $i < count($arrayDatos); $i++) { 
                $data = $arrayDatos[$i];
                parent::createConcept($data->descripcion, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $lastNomina->id_nomina);
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
        $arrayDatos = json_decode($_POST['arrayDatos']);
        $fk_nomina = $_POST['fk_nomina'];
    

        if($fk_nomina && $arrayDatos){
            
            parent::deleteTodosConceptos($fk_nomina);

            for ($i=0; $i < count($arrayDatos); $i++) { 
                $data = $arrayDatos[$i];
      
                parent::createConcept($data->descripcion, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $fk_nomina);
          
               
            }
            echo json_encode(['ok'=> 'Creado']);
            return;
        }else{

            echo json_encode(['error'=> 'Debes llenar todos los campos']);
            return;
        }
    }

    public function downloadpdf()
    {
        require_once 'vendor/autoload.php';

        $id = $_REQUEST['id'];
        $id_nomina =$_REQUEST['id_nomina'];

        
        $conceptos=Nomina::consultarConceptosPorNomina($id_nomina);
        $nomina=Nomina::consultarUnaNomina($id_nomina);
        
        $html =' <div class="container text-dark">
        <div class="grid">          
            <table class=" mt-3 total w-100 ">
                <tr class="text-left">
                    <th class=""><p class="font-weight-bold text-uppercase">Servicios y suministros la equidad</p>
                    <p class="">Direccion: Cra. 113b ##152b-37</p></th>
                    <th class=" font-weight-normal "><img  src="assets/svg/logo.svg" alt="logo empresa" width="30%"></th>
                </tr>
            </table>   
        </div>    
 
        <div class="grid">
         
                <p class="font-weight-bold">Nombre: <span class="font-weight-normal text-capitalize">'.$nomina->nombres.' '.$nomina->apellidos.'</span></p>
                <p class="font-weight-bold">C.C: <span class="font-weight-normal">'.$nomina->numero_documento.'</span></p>
   
 
                <p class="font-weight-bold">Cargo: <span class="font-weight-normal">'.$nomina->nombre_cargo.'</span></p>
                <p class="font-weight-bold">Periodo de: <span class="font-weight-normal"> '. $nomina->fecha_de.'</span></p>
                <p class="font-weight-bold">Periodo a:<span class="font-weight-normal"> '. $nomina->fecha_hasta.'</span></p>
        
        </div>
  
        <div class="grid ">
            <div class="w-100">
                <table class="table table-bordered table_nomina">

                    <tr>
                        <th scope="col" colspan="3" class="text-center b-custom">INGRESOS</th>
                    </tr>


                    <tr class="">
                        <th scope="col" class="text-center">
                            Descripción
                        </th>
                        <th scope="col"class="text-center">
                            Tipo Concepto
                        </th>
                        <th scope="col" class="text-center">
                            Pagos
                        </th>
                    </tr>';
                   
                    foreach ($conceptos as $concepto) {
                        $html.='<tr>
                        <td  class="text-left ">
                            '.$concepto->descripcion.'
                        </td>

                        <td class="text-center text-capitalize">
                            '.$concepto->tipo_concepto.'
                        </td>

                        <td class="text-right">
                        '.$concepto->valor.'
                        </td>
                    </tr>';
                        if($concepto->id_asiento_contable == 2)
                        {
                            $total -=$concepto->valor;

                        }else{
                            $total +=$concepto->valor;
                        }
                        
                    }


                    $html.='<tr>
                        <td scope="col" colspan="2" class="text-right">Total</td>
                        <td scope="col" class="text-right">'.$total.'</td>
                    </tr>

                </table>
            </div>

        
        </div>
        
    </div>';
        $mpdf = new \Mpdf\Mpdf();

        $stylesheet =file_get_contents('assets/css/styles.css');
        $stylesheetpdf =file_get_contents('assets/css/pdf.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($stylesheetpdf,1);
        $mpdf->WriteHTML($html);
        $mpdf->Output('nomina'.$_SESSION['EMPLEADO']->numero_documento.'.pdf',"I");
    }




    public function destroy(){
        $id_nomina=$_POST['id'];

        parent::deleteNomina($id_nomina);
        header('location:?class=Nominas&view=index');

    }




  


}