<?php

use Faker\Core\Number;

class UsuariosController extends Usuario{

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
       //? trae la informacion en formato JSON
       public function allUsersJson()
       {
           echo parent::allUsers();
       }
   
       //? trae la vista de Gestion de Usuarios
       public function show()
       {
           $title= 'Gestion De Usuarios';
           $moduloJs = '<script src="assets/js/modulos/users/users.js" type="module"></script>';
           require_once 'views/administrador/usuarios.php';
           
       }
   
       //? funcion para crear un usuario
       public function store()
       {
   
            //POST
           $nombres = Security::verificateName( $_POST['nombres']);
           $apellidos = Security::verificateName( $_POST['apellidos']);
           $correo = Security::verificateEmail( $_POST['correo']);
           $clave1 = Security::verificatePassword($_POST['clave']);
           $numero_documento = Security::verificateDocument( $_POST['numero_documento']);
           $fk_rol = Security::verificateInt( $_POST['rol']);
           $fk_cargo = Security::verificateInt( $_POST['cargo']);
           $fk_tipo_documento = Security::verificateInt( $_POST['tipo_documento']);
           $fk_tipo_contrato = Security::verificateInt( $_POST['fk_tipo_contrato']);
           $salario = Security::verificateInt( $_POST['salario']);



           //Nomina
           $fecha_de = $_POST['fecha_de'];
           $fecha_hasta = $_POST['fecha_hasta'];
           $arrayDatos = json_decode($_POST['arrayDatos']);

           if($nombres && $apellidos && $correo && $clave1 && $numero_documento && $fk_rol  && $fk_cargo && $fk_tipo_documento && $fk_tipo_contrato && $salario && $fecha_de && $fecha_hasta && $arrayDatos)
           {

               if(!Login::verificarSiExisteEmail($correo))
               {
                    //? img si no se pone una img tomara el valor por defecto empty(si esta undefined da false)
                    if(empty($_POST['user_img']))
                    {
                        //? Update Img
                        $fecha = new DateTime();
                        // funcion img
                        $directorio = "assets/uploud/profile/";
                        $archivo= $directorio.basename($fecha->getTimeStamp().$_FILES["user_img"]["name"]);
                        //info de ext(jpg,png,etc)
                        $tipoArchivo =strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
                        //verifica que el archivo tenga dimensiones(w,h) 
                        $DimensionesImg =getimagesize($_FILES['user_img']['tmp_name']);
        
                        if($DimensionesImg == true)
                        {
                            $tamañoImg = $_FILES['user_img']["size"];
                            if($tamañoImg > 2000000)
                            {
                                // echo "El archivo tiene que ser menor a 2mb";
                                echo json_encode(['error'=>"El archivo tiene que ser menor a 2mb"]);
                                return;
                            }
                            else{
                                if($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" )
                                {
                                    move_uploaded_file($_FILES["user_img"]["tmp_name"],$archivo);
                                    $img_usuario=$archivo;
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
                        $img_usuario = 'assets/uploud/profile/default.svg';
                    }


                   $token = $this->seguridad->encryptToken(str_replace(' ','',$nombres.$numero_documento.$apellidos));
                   $clave = password_hash($clave1,PASSWORD_DEFAULT);
                   parent::storeUser($nombres,$apellidos,$correo,$salario,$clave,$img_usuario,$numero_documento,$fk_rol,$fk_cargo,$fk_tipo_documento,$fk_tipo_contrato,$token);
                   
                   

                   //?NOMINA
                   $fk_usuario = parent::consultarUltimoUsuario();
                   $nomina = new Nomina();
                   if($fecha_de && $fecha_hasta && $arrayDatos){

                       $nomina->createNomina($fk_usuario->id, $fecha_de, $fecha_hasta,2);
           
                       $lastNomina =$nomina->consultarUltimaNomina();
                       
                       $total = 0;
                       for ($i=0; $i < count($arrayDatos); $i++) { 
                           $data = $arrayDatos[$i];
                           $nomina->createConcept($data->descripcion,2, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $lastNomina->id_nomina);
           
                           if($data->fk_asiento_contable == 2)
                           {
                               $total -=$data->valor;
           
                           }else{
                               $total +=$data->valor;
                           }
                       }
                       
           
                       $nomina->updateNominaValor($total,$lastNomina->id_nomina);
                       echo json_encode(['ok'=> 'Creado']);
                       return;
                   }else{
                       return;
                   }

                   //? END-NOMINA

                   echo json_encode(['ok' => 'usuarioCreado']);


               }else{
                   echo json_encode(['error' => 'correoExistente']);
               }
           }
           else{
                echo json_encode(['error' => 'errorAgregarUsuario']);
                return;
           }
       }
   
       //? Funcion para actualizar un usuario
       public function update()
       {
        $id = Security::verificateInt($_POST['update_id']);
        $nombres = Security::verificateName( $_POST['update_nombres']);
        $apellidos = Security::verificateName( $_POST['update_apellidos']);
        $correo = Security::verificateEmail( $_POST['update_correo']);
        $clave1 = Security::verificatePassword($_POST['update_clave']);
        $numero_documento = Security::verificateDocument( $_POST['update_numero_documento']);
        $fk_rol = Security::verificateInt( $_POST['update_rol']);
        $fk_tipo_contrato = Security::verificateInt( $_POST['update_tipo_contrato']);
        $fk_cargo = Security::verificateInt( $_POST['update_cargo']);
        $fk_tipo_documento = Security::verificateInt( $_POST['update_tipo_documento']);
        $salario = Security::verificateInt( $_POST['update_salario']);


        $updated_at = Security::verificateDate($_POST['updated_at']);
        $token =$_POST['token'];
        // para validar el token con el token de la DB
        $usuario = parent::showUser($id,$token);
        // si no quiere actualizar la clave se usa el input hidden
        $claveAntigua =$_POST['clave_antigua'];

        //validacion de la clave si no se envia nada en el input update_clave se envia la clave_antigua
        if(empty($clave1) || $clave1 == false)
        {
            //se valida que la clave antigua sea igual a la que esta en la DB
            if($claveAntigua == $usuario->clave)
            {
                $clave =$claveAntigua;
            }
            else{
                echo json_encode(['error' => 'errorActualizarUsuario1']);
                return;
            }

        }else if($clave1)
        {
            $clave =password_hash($clave1,PASSWORD_DEFAULT); 
        }


        //Nomina
        $arrayDatos = json_decode($_POST['arrayDatos']);
        $fk_nomina = ($_POST['fk_nomina']);


        if($nombres && $apellidos && $correo && $numero_documento && $fk_rol && $fk_tipo_contrato && $fk_cargo && $fk_tipo_documento  && $salario && $updated_at && $usuario->token == $token && isset($clave)  && $fk_nomina && $arrayDatos )
        {
            
            if(!Login::verificarSiExisteEmail($correo) || Login::verificarSiExisteEmailUpdate($correo,$id))
            {
                //img uploud
                 //? img si no se pone una img tomara el valor por defecto empty(si esta undefined da false)
                 if(empty($_POST['update_user_img']))
                 {
                     //? Update Img
                     $fecha = new DateTime();
                     // funcion img
                     $directorio = "assets/uploud/profile/";
                     $archivo= $directorio.basename($fecha->getTimeStamp().$_FILES["update_user_img"]["name"]);
                     //info de ext(jpg,png,etc)
                     $tipoArchivo =strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
                     //verifica que el archivo tenga dimensiones(w,h) 
                     $DimensionesImg =getimagesize($_FILES['update_user_img']['tmp_name']);
     
                     if($DimensionesImg == true)
                     {
                         $tamañoImg = $_FILES['update_user_img']["size"];
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
                                 move_uploaded_file($_FILES["update_user_img"]["tmp_name"],$archivo);
                                 $img_usuario=$archivo;
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
                     $img_usuario = $usuario->img_usuario;
                 }

                 $nomina = new Nomina();
                 $nomina->deleteTodosConceptos($fk_nomina);
                 $total = 0;
                 for ($i=0; $i < count($arrayDatos); $i++) { 
                    $data = $arrayDatos[$i];
          
                    $nomina->createConcept($data->descripcion,2, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $fk_nomina);
    
                    if($data->fk_asiento_contable == 2)
                    {
                        $total -=$data->valor;
    
                    }else{
                        $total +=$data->valor;
                    }
                   
                }
                
                $nomina->updateNominaValor($total,$fk_nomina);


                $token1 = $this->seguridad->encryptToken(str_replace(' ','',$nombres.$numero_documento.$apellidos));
                parent::UpdateUser($nombres,$apellidos,$correo,$salario,$clave,$img_usuario,$numero_documento,$fk_rol,$fk_cargo,$fk_tipo_documento,$fk_tipo_contrato,$token1,$updated_at,$id);
                echo json_encode(['ok' => 'usuarioActualizado']);


            }else{
                echo json_encode(['error' => 'correoExistente']);
            }
            

        }else{
            echo json_encode(['error' => 'errorActualizarUsuario']);
            return;
        }

       }
   
       //? Funcion para eliminar un usuario
       public function destroy()
       {
           $id=$this->seguridad->verificateInt($_REQUEST['delete_id']);
           $token = $_REQUEST['token'];
           $usuario = parent::showImgUser($id);
           if($id && $token)
           {
                if($usuario->img_usuario != 'assets/uploud/profile/default.svg')
                {
                    unlink($usuario->img_usuario);
                }
                parent::deleteUser($id,$token);
           }
       }
       //? Funcion para Deshabilitar un usuario
       public function disable()
       {
           $id=$this->seguridad->verificateInt($_REQUEST['delete_id']);
           $token = $_REQUEST['token'];
           $option = $this->seguridad->verificateInt(intval($_REQUEST['option']));
           if($id && $token && $option)
           {
               parent::DisableUser($id,$token,$option);
           }
           return;
       }
   
    
}