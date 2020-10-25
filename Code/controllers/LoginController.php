<?php 

class LoginController extends Login{
  
    public function auth()
    {     
       
        $nombre_usuario = Security::verificateEmail($_POST['nombre_usuario']);
        $passVerificado = Security::htmlChars($_POST['password']);
        $usuario = parent::verificarLogin($nombre_usuario);
        
        if($nombre_usuario && $usuario && $passVerificado)
        {
            $password = password_verify($passVerificado, $usuario->clave);
            $verificarEmail  = Login::verificarSiExisteEmail($nombre_usuario);

            if($nombre_usuario == $usuario->correo && $password == true)
            {
                if( $usuario->fk_rol == 1)
                {
                    $_SESSION['ADMINISTRADOR'] = $usuario;
                    echo json_encode($usuario);
                }
                else if( $usuario->fk_rol == 2){
                    $_SESSION['EMPLEADO'] = $usuario;
                    echo json_encode($usuario);
                }
                    
            }else if($verificarEmail){
                echo json_encode(['error' => 'incorrectoP']); //P password

            }

        }else if($nombre_usuario && $passVerificado)
        {
            echo json_encode(['error' => 'incorrectoU&P']); // U user & P password
        } 
        else{
            
            header('location:?c=All&m=index');
        }

 
        
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
        header('location:?c=All&m=index');
        exit;
    }

}