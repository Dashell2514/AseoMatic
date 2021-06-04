<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Dashboard Administrador'; ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png" >
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/quill.snow.css">
</head>

<body>

        <div class="d-flex w-100 contenedor">
          <!--  ! Sidebar  -->
      
            <div class="bg-dark  " id="sidebar">
                <p class="diplay-6  text-white my-3 px-2 size-sm text-center text-capitalize"><?php echo $_SESSION['ADMINISTRADOR']->nombre_rol ?></p>
              <div class="img-dashboard d-flex flex-column justify-content-center align-items-center mt-2">
                <img src="<?php echo $_SESSION['ADMINISTRADOR']->img_usuario?>" class="img-avatar-male" alt="">
                <p class="diplay-6  text-white my-3 px-2 size-sm text-center text-capitalize"><?php echo $_SESSION['ADMINISTRADOR']->nombres.' '.$_SESSION['ADMINISTRADOR']->apellidos;?></p>
              </div>
              <div class="menu-settings text-capitalize">
                <a href="?c=Usuarios&m=show" class="list-group-item list-group-item-action bg-dark text-white">Administrar Usuarios</a>
                <a href="?c=Nominas&m=index" class="list-group-item list-group-item-action bg-dark text-white">Administrar Nominas</a>
                <a href="?c=Noticias&m=showNews" class="list-group-item list-group-item-action bg-dark text-white">Administrar Noticias</a>
                <a href="?c=Eventos&m=showEvents" class="list-group-item list-group-item-action bg-dark text-white">Administrar Eventos</a>
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