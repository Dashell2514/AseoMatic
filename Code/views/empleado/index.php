
<?php 
    require_once 'layout/header.php';
?>

       <!-- ? Main -->

       <main class="main">
        <!-- * Cards -->
        <p class="h3 text-dark text-shadow  font-weight-bold text-center text-capitalize">Bienvenido <?php echo $_SESSION['EMPLEADO']->nombres.' '.$_SESSION['EMPLEADO']->apellidos?></p>
          <div class="container mt-5 px-5  ">
           
           
                <div class="row ">
                  
                  <div class="col-lg-6 card-div col-md-12 col-sm-12 mb-3">
                    <div class="b-custom rounded card medium background d-flex justify-content-center align-items-center b-r-custom">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/certificate.svg" width="100px">
                        </div>
                      <div class="card-body  d-flex flex-column justify-content-center align-items-center">
                        <p class="h3 card-title text-white font-weight-bold text-center">Certificados Laborales</p>
                     
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="customer/certificados.html">Acceder</a>
                       
                      </div>
                          
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-3 col-sm-12">
                    <div class="b-custom rounded card medium background d-flex justify-content-center align-items-center b-r-custom">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/payroll1.svg" width="100px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h3 card-title   text-white font-weight-bold">Nomina</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="#">Acceder</a>
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

