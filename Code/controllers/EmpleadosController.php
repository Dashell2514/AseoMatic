<?php 


class EmpleadosController extends Empleado{
    private $seguridad;

    public function __construct()
    {
        try
        {
            $this->seguridad = new Security();
            $this->seguridad->seguridadEmpleados();
        }catch(Exception $e)
        {
            die('Error de Instacia');
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
        <div class="grid ">
            <div class="col-md-6 ">
                <p class="d-flex  font-weight-bold text-uppercase">Servicios y suministros la equidad</p>
                <p class="d-flex">Direccion: Cra 12 # 43 - 12</p>
                <p class="d-flex">NIT: 123484114 - 12</p>
            </div>

            <div class="col-md-6-2 text-dark ">
                <img  src="assets/img/logo.png" class="d-flex center" alt="logo empresa" width="40%">
            </div>
        </div>


    
        <div class="grid">
            <div class="col-md-6 "> 
                <p class="font-weight-bold">Nombre: <span class="font-weight-normal text-capitalize">'.$_SESSION["EMPLEADO"]->nombres.' '.$_SESSION["EMPLEADO"]->apellidos.'</span></p>
                <p class="font-weight-bold">C.C: <span class="font-weight-normal">'.$_SESSION["EMPLEADO"]->numero_documento.'</span></p>
            </div>
            <div class="col-md-6-2"> 
                <p class="font-weight-bold">Cargo: <span class="font-weight-normal">'.$_SESSION["EMPLEADO"]->nombre_cargo.'</span></p>
                <p class="font-weight-bold">Periodo de: <span class="font-weight-normal"> '. $nomina->fecha_de.'</span></p>
                <p class="font-weight-bold">Periodo a:<span class="font-weight-normal"> '. $nomina->fecha_hasta.'</span></p>
            </div>
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
                            VALOR
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
                    }


                    $html.='<tr>
                        <td scope="col" colspan="2" class="text-right">Total</td>
                        <td scope="col" class="text-right">5.831.00</td>
                    </tr>

                </table>
            </div>

        
        </div>
    
            <div class="grid">          
                <table class=" mt-3 table total w-100 table-bordered">
                    <tr class="text-left">
                        <th class="  " >Neto a pagar</th>
                        <th class=" font-weight-normal ">5.8040</th>
                    </tr>
                </table>   
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

    public function index()
    {
        $title='Empleado';
        require_once('views/empleado/index.php');
    }

    public function showNomina()
    {
        $title='Empleado Nomina';
        require_once 'views/empleado/nomina.php';
    }
    
    public function showCertificado()
    {
        $title='Empleado Certificado';
        require_once 'views/empleado/certificado.php';
    }

    public function showPerfil()
    {
        $title = 'Empleado Perfil';
        require_once 'views/empleado/perfil.php';
        
    }

    public function show()
    {
        $token = $_SESSION['EMPLEADO']->token;
        echo parent::showProfile($token);
    }

    public function update()
    {
        $pass = Security::verificatePassword($_POST['password_perfil']);
        $passConfirm = Security::verificatePassword($_POST['confirm_password_perfil']);
        $token = $_POST['token_perfil'];
        $usuario = json_decode(parent::showProfile($token));
        $update_at = date("Y-m-d");


        if($pass == $passConfirm && $token && $update_at )
        {
            //img uploud
             //? img si no se pone una img tomara el valor por defecto empty(si esta undefined da false)
             if(empty($_POST['change_img']))
             {
                 //? Update Img
                 $fecha = new DateTime();
                 // funcion img
                 $directorio = "assets/uploud/profile/";
                 $archivo= $directorio.basename($fecha->getTimeStamp().$_FILES["change_img"]["name"]);
                 //info de ext(jpg,png,etc)
                 $tipoArchivo =strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
                 //verifica que el archivo tenga dimensiones(w,h) 
                 $DimensionesImg =getimagesize($_FILES['change_img']['tmp_name']);
 
                 if($DimensionesImg == true)
                 {
                     $tamañoImg = $_FILES['change_img']["size"];
                     if($tamañoImg > 2000000)
                     {
                         // echo "El archivo tiene que ser menor a 2mb";
                         echo json_encode(['error'=>"El archivo tiene que ser menor a 2mb"]);
                         return;
                     }
                     else{
                         if($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" )
                         {

                             //borra la img que tenia si actualiza
                            if($usuario->img_usuario != 'assets/uploud/profile/default.svg')
                            {
                                 unlink($usuario->img_usuario);

                            }
                             move_uploaded_file($_FILES["change_img"]["tmp_name"],$archivo);
                             $imgProfile=$archivo;
                         }
                         else{
                             // echo "la extension del archivo no es valida";
                             echo json_encode(['error'=>'a extension del archivo no es valida']);
                             return;
                         }
                     }
                 }else
                 {
                     // echo "el documento no es una img";
                         echo json_encode(['error'=> 'el documento no es una img']);
                         return;
 
                 }
             }else{
                 $imgProfile = $usuario->img_usuario;
             }

            $clave =password_hash($pass,PASSWORD_DEFAULT); 

            parent::updateProfile($clave,$imgProfile,$update_at,$token);

            // $_SESSION['EMPLEADOS'] = json_decode(parent::showProfile($token));
            echo json_encode(['ok' => 'usuarioActualizado']);


        }else{
            echo json_encode(['error' => 'Fallo']);
        }
    }

    public function destroy()
    {

    }
}