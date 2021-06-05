<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo isset($title) ? $title  :'Dashboard Empleado';?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png" >
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>

        <div class="d-flex w-100 contenedor">
          <!--  ! Sidebar  -->
      
            <div class="bg-dark  " id="sidebar">
              <!-- <div class="sidebar-heading text-white text-center">Bienvenido</div> -->
              <div class="img-dashboard d-flex flex-column justify-content-center align-items-center mt-5">
                <img src="<?php $usuario = json_decode(parent::showProfile($_SESSION['EMPLEADO']->token));echo $usuario->img_usuario;?>" class="img-avatar-male" alt="" id="imgAvatarProfile">
                <p class="diplay-6  text-white my-3 px-2 size-sm text-center text-capitalize"><?php echo $_SESSION['EMPLEADO']->nombres.' '.$_SESSION['EMPLEADO']->apellidos?></p>
              </div>
              <div class="menu-settings text-capitalize" >
                <a href="?c=Empleados&m=showNomina" class="list-group-item list-group-item-action bg-dark text-white">Nominas</a>
                <a href="?c=Empleados&m=showPerfil" class="list-group-item list-group-item-action bg-dark text-white">Perfil</a>
                <a href="?c=Login&m=destroy" class="list-group-item list-group-item-action bg-dark text-white">Salir</a>
              </div>
            </div> 
         <!-- ! End  Sidebar  -->
  
       
          <!-- ! Content  -->
          <div id="content" class="container-fluid m-0 h-100 p-0 d-flex flex-column justify-content-between ">
  
            <div class="container-fluid bg-dark m-0 p-1 position-sticky btn-div  d-flex justify-content-between">
  
              <button type="button" id="sidebarCollapse" class="btn btn-primary  b-custom ">
                &#9776;
              </button>    

             

              
          </div>