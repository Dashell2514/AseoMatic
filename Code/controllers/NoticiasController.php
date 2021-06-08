<?php 

class NoticiasController extends Noticia
{
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
    public function allNewsJson()
    {
        echo parent::allNews();
    }

    function showNews()
    {
        $title = "Gestion de Noticias";
        $moduloJs = '<script src="assets/js/modulos/news/news.js" type="module"></script>';
        require_once 'views/administrador/noticias.php';
    }

    function storeNew()
    {
        $fecha = new DateTime();
        $directorio = "assets/uploud/news/";
        $archivo= $directorio.basename($fecha->getTimeStamp().$_FILES["new_img"]["name"]);
        //info de ext(jpg,png,etc)
        $tipoArchivo =strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
        //verifica que el archivo tenga dimensiones(w,h) 
        $DimensionesImg =getimagesize($_FILES['new_img']['tmp_name']);

        //POST
        $tituloNoticia = Security::htmlChars($_POST['titulo_noticia']);
        $descripcionNoticia = $_POST['descripcion_noticia'];
        $fechaPublicacion = date("Y-m-d H:i:s");
        $newUser = Security::verificateInt($_POST['fk_usuario']);

        if($DimensionesImg == true)
        {
            $tamañoImg = $_FILES['new_img']["size"];
            if($tamañoImg > 2000000)
            {
                // echo "El archivo tiene que ser menor a 2mb";
                echo json_encode(['error'=>'El<2mb']);
            }
            else{
                if($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" )
                {
                    
                    if($tituloNoticia && $descripcionNoticia && $fechaPublicacion && $newUser)
                    {
                      
                        move_uploaded_file($_FILES["new_img"]["tmp_name"],$archivo);
                        $imgNew = $archivo;
                        parent::storeAddNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$imgNew,$newUser);
                        echo json_encode(['ok'=>'CreadaNoticia']);

                    }else{
                        echo json_encode(['error'=>'errorCrearNoticia']);
                    }
            
                }
                else{
                    echo json_encode(['error'=>'noImgExtension']);
                    header('location=?c=All&m=index');
                    //no es una img 
                }
            }
        }else{
            echo json_encode(['error'=>'noImg']);
            // echo "el documento no es una img";
            header('location=?c=All&m=index');

        }
    

        
    }

    public function updateNews()
    {
        $idNoticia =Security::verificateInt($_POST['update_id_noticia']);
        $tituloNoticia = Security::htmlChars($_POST['update_titulo_noticia']);
        $descripcionNoticia =$_POST['update_descripcion_noticia'];
        $fechaPublicacion = date("Y-m-d H:i:s");
        $idUser = Security::verificateInt($_POST['update_fk_usuario']);
        if($idNoticia && $fechaPublicacion && $idUser && $descripcionNoticia && $tituloNoticia)
        {
            //para la ruta de la imagen 
            $rutaImg=parent::showImg($idNoticia)->imagen_noticia;

            $imgUpdate = '';
            //? si no se actualiza una img tomara el valor que tenia anteriormente y si actualiza se borrara la anterior
            if(empty($_POST['update_new_img']))
            {
                //? Update Img
                $fecha = new DateTime();
                // funcion img
                $directorio = "assets/uploud/news/";
                $archivo= $directorio.basename($fecha->getTimeStamp().$_FILES["update_new_img"]["name"]);
                //info de ext(jpg,png,etc)
                $tipoArchivo =strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
                //verifica que el archivo tenga dimensiones(w,h) 
                $DimensionesImg =getimagesize($_FILES['update_new_img']['tmp_name']);

                if($DimensionesImg == true)
                {
                    $tamañoImg = $_FILES['update_new_img']["size"];
                    if($tamañoImg > 2000000)
                    {
                        // echo "El archivo tiene que ser menor a 2mb";
                        echo json_encode(['error'=>"El archivo tiene que ser menor a 2mb"]);
                    }
                    else{
                        if($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" )
                        {
                            //Borra la imagen que tenia antes
                            unlink($rutaImg);
                            move_uploaded_file($_FILES["update_new_img"]["tmp_name"],$archivo);
                            $imgUpdate=$archivo;
                        }
                        else{
                            // echo "la extension del archivo no es valida";
                            echo json_encode(['error'=>'a extension del archivo no es valida']);
                        }
                    }
                }else{
                    // echo "el documento no es una img";
                     echo json_encode(['error'=> 'el documento no es una img']);

                }
            }else{
                $imgUpdate = $rutaImg;
            }

            parent::updateNew($tituloNoticia,$descripcionNoticia,$fechaPublicacion,$imgUpdate,$idUser,$idNoticia);
            echo json_encode(['ok'=> 'ActualizacionNoticia']);
        }else{
            echo json_encode(['error'=> 'FalloActualizacionNoticia']);
        
        }


    }

    public function destroyNew()
    {
        $id = $_REQUEST['id'];
        //funcion para mostrar la ruta de la img por id
        $rutaImg = parent::showImg($id);
        //Funcion que borra la imagen (recibe la ruta de img)
        unlink($rutaImg->imagen_noticia);
        parent::deleteNew($id);
    }
    
}