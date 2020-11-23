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