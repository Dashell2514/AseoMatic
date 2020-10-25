<?php 

class Security extends DataBase{

    //Si intentan acceder a Modulo Administrador sin tener una sesion se redirigira a modulo empleado(si tiene una sesion empleado) o a inicio si no tiene sesion
    public function seguridadAdministrador()
    {
        if(empty($_SESSION['ADMINISTRADOR']) || is_null($_SESSION['ADMINISTRADOR']) )
        {
            if(isset($_SESSION['EMPLEADO']))
            {
                header('location:?c=Empleados&m=index');
            }else{
                header('location:?c=All&m=index');
            }
        }
        //
        
    }

    //Si intentan acceder a Modulo Empleado sin tener una sesion se redirigira a modulo Administrador(si tiene una sesion empleado) o a inicio si no tiene sesion
    public function seguridadEmpleados()
    {
       
        if(empty($_SESSION['EMPLEADO']) || is_null($_SESSION['EMPLEADO']))
        {
            if(isset($_SESSION['ADMINISTRADOR']))
            {
                header('location:?c=Administradores&m=index');
            }else{
                header('location:?c=All&m=index');
            }
        }
        
    }


    //Si intentan acceder a el index de la pagina pero si existe una sesion ya sea Empleado o Administrador se redirigira al inicio del modulo segun la sesion
    public function seguridad()
    {
        if(isset($_SESSION['ADMINISTRADOR']))
        {
            header('location:?c=Administradores&m=index');
        }
        else if(isset($_SESSION['EMPLEADO']))
        {
            header('location:?c=Empleados&m=index');
        }
    }

    static public function htmlChars($value)
    {
        return htmlspecialchars($value,ENT_QUOTES);
    }


    //verificar el email recibido del formulario LoginModal
    static public function verificateEmail($email)
    {
        $reGex= preg_match('/^(([^<>()\[\]\\.,:\s@"]+(\.[^<>()\[\]\\.,:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email);

        $htmlSpecial= self::htmlChars($email);
       

        //si $reGex es 1 o true se ejecuta
            if($reGex) return $htmlSpecial;
            return false;
    }

    //verificar nombre 

    static public function verificateName($name)
    {
        $reGex = preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,25}$/', $name);
        $htmlSpecial= self::htmlChars($name);
            if($reGex) return $htmlSpecial;
        return false;
    }

    //verificar Password al crear un usuarios en ModalAddUser vista Usuarios.php
   static public function verificatePassword($pass)
   {
        // Debe tener 1 letra minúscula, 1 letra mayúscula, 1 número y tener al menos 8 caracteres.
        $passwordRegex = preg_match('/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/',$pass);
        $htmlSpecial= self::htmlChars($pass);

            if($passwordRegex) return $htmlSpecial;
        return false;
   
   }

   static public function encryptToken($token)
   {   
       return crypt($token,'$2a$07$Da22vidJuAjiNoYyZlXGh45HP$');
   }

   //verificar que se recibe el valor numerico de los fk
   static public function verificateInt($int)
   {
        $intRegex = preg_match('/^[0-9]{1,11}$/',$int);
        $htmlSpecial= self::htmlChars($int);

            if($intRegex) return $htmlSpecial;
        return false;
   }


   //verificar que se recibe el valor numerico de los fk
   static public function verificateDocument($document)
   {
        $documentRegex = preg_match('/^[0-9]{1,11}$/',$document);
        $htmlSpecial= self::htmlChars($document);

            if($documentRegex) return $htmlSpecial;
        return false;
   }

   static public function verificateDate($date)
   {
        $dateRegex = preg_match('/^[0-9-]{1,10}$/',$date);
        $htmlSpecial= self::htmlChars($date);

            if($dateRegex) return $htmlSpecial;
        return false;
   }
}