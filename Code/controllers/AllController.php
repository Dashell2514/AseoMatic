<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once 'vendor/autoload.php';

class AllController{
    
    private $seguridad;

    public function __construct()
    {
        try
        {
            $this->seguridad = new Security();
            $this->seguridad->seguridad();
        }catch(Exception $e)
        {
            die('Error de Instancia');
        }

    }



    public function index()
    {
        $moduloJs = '<script src="assets/js/modulos/home/home.js" type="module"></script>';
        require_once 'views/all/index.php';
    }

    public function formContact()
    {
        if($_POST['nombre_contact'] && $_POST['apellido_contact'] && $_POST['email_contact'] && $_POST['asunto_contact'] && $_POST['message_contact'] && $_POST['genero_contact'] && $_POST['terminos_contact'])
        {
            $nombreContact = $this->seguridad::verificateName($_POST['nombre_contact']);
            $apellidoContact = $this->seguridad::verificateName($_POST['apellido_contact']);
            $correoContact = $this->seguridad::verificateEmail($_POST['email_contact']);
            $asuntoContact = $this->seguridad::htmlChars($_POST['asunto_contact']);
            $mensajeContact = $this->seguridad::htmlChars($_POST['message_contact']);
            $generoContact = $this->seguridad::htmlChars($_POST['genero_contact']);
            $terminosContact = $this->seguridad::htmlChars($_POST['terminos_contact']);
            $fechaContact= date("Y-m-d");
    

            if($nombreContact && $apellidoContact && $correoContact && $asuntoContact && $mensajeContact && $generoContact && $terminosContact)
            {
                $mail = new PHPMailer(true);
                try {
                    $mail->CharSet = 'UTF-8';
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = '028de6b4dea01b';                     // SMTP username
                    $mail->Password   = 'ab1fceab36503b';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
                    $mail->Port       = 2525;

                    //Recipients
                    $mail->setFrom('aseomatic@gmail.com',$asuntoContact);
                    $mail->addAddress('aseomatic@gmail.com');     // Add a recipient
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
        
                    // Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Correo De Contacto AseoMatic';
                    $mail->Body    = 'Nombre: '.$nombreContact.' '.$apellidoContact.'<br>
                                    Correo: '.$correoContact.'<br>
                                    Asunto: '.$asuntoContact.'<br>
                                    Mensaje: '.$mensajeContact.'<br>
                                    Genero: '.$generoContact.'<br>';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                    $mail->send();
                    Usuario::emailLog($nombreContact,$apellidoContact,$generoContact,$correoContact,$asuntoContact,$mensajeContact,$fechaContact);
                    
                    return true;
                    // return json_encode(['ok' => 'FCE']); // Formulario Contacto Enviado
                } catch (Exception $e) {
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    return json_encode(['error' => 'EFC']); //Error Formulario Contacto
                    
                }
            }else{
                return json_encode(['error' => 'EFC']); //Error Formulario Contacto
                header('location:?c=All&m=index');
            }

        }else{
            header('location:?c=All&m=index');
        }

    }

    public function showModal()
    {
        if($_REQUEST['tabla'] &&  $_REQUEST['campo'] &&  $_REQUEST['tipo'] &&  $_REQUEST['id']){
            echo json_encode(Administrador::allTableId($_REQUEST['tabla'],$_REQUEST['campo'],$_REQUEST['tipo'],$_REQUEST['id']));
        }else{
            header('location:?c=All&m=index');
        }
  
    }

    

}