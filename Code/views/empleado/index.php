
<?php 
    require_once 'layout/header.php';
?>

       <!-- ? Main -->

       <main class="main">
        <!-- * Cards -->
        <p class="h3 text-dark text-shadow  font-weight-bold text-center text-capitalize">Bienvenido <?php echo $_SESSION['EMPLEADO']->nombres.' '.$_SESSION['EMPLEADO']->apellidos?></p>
          <div class="container mt-5 px-5  ">
           
           
                <div class="row">
                  
                  <div class="col-lg-12 col-md-12 mb-3 col-sm-12">
                    <div class="b-custom rounded card medium background d-flex justify-content-center align-items-center b-r-custom">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/payroll1.svg" width="200px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h1 card-title   text-white font-weight-bold">Nomina</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="?c=Empleados&m=showNomina">Acceder</a>
                      </div>
                    </div>
                  </div>
                </div>       
          </div>
        <!-- * End Cards-->
       </main>

       <!-- ? End Main -->

<?php
require_once 'layout/footer.php';
?>

<table>
  <th>
    <tr></tr>
    <tr></tr>
  </th>
</table>