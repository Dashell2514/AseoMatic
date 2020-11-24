<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpmailer/src/Exception.php';
require 'assets/phpmailer/src/PHPMailer.php';
require 'assets/phpmailer/src/SMTP.php';

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
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
                    //Recipients
                    $mail->setFrom('aseomatic22@gmail.com',$asuntoContact);
                    $mail->addAddress('davidhernandezjuajinoy@gmail.com');     // Add a recipient
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