<?php 

require_once 'core/core.php';

$controller = isset($_GET['c']) ? $_GET['c'] : 'All';
$method = isset($_GET['m']) ? $_GET['m'] : 'index';

$controller=$controller.'Controller';
$controllerFile='controllers/'.$controller.'.php';


if(file_exists($controllerFile))
{
    require_once($controllerFile);
    // se crea la instancia del controlador ejemplo (HomeController)
    $objController = new $controller();
    //se verifica que el metodo exista y si existe se llama
    if(method_exists($objController,$method))
    {
        $objController->$method();
    }else{
        // echo 'no existe metodo';
        require_once 'views/errors/error404.php';
    }
 
}
else{
    // echo 'no existe controller';
    require_once 'views/errors/error404.php';
}

// call_user_func([$controller,$method]);
// $objeto = new $controller();
// $objeto->$method();