<?php  require_once 'layout/header.php'; ?>

<!-- ? Main -->

<main class="main w-100">
        <p class="h3 text-dark text-shadow font-weight-bold text-center text-capitalize mb-5">Bienvenido
        <?php echo $_SESSION['ADMINISTRADOR']->nombres." ".$_SESSION['ADMINISTRADOR']->apellidos?> </p>
        

        
                <div class="d-flex flex-wrap justify-content-center align-items-center mb-5 ">
                  
                    <div class="b-custom rounded card d-flex justify-content-center align-items-center b-r-custom my-2 mx-4">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/users.svg" width="200px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h2 card-title   text-white font-weight-bold">Usuarios</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="?c=Usuarios&m=show">Acceder</a>
                      </div>
                    </div>


                    <div class="b-custom rounded card d-flex justify-content-center align-items-center b-r-custom my-2 mx-4">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/payroll1.svg" width="200px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h2 card-title   text-white font-weight-bold">Nomina</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="?c=Nominas&m=index">Acceder</a>
                      </div>
                    </div>


                    <div class="b-custom rounded card d-flex justify-content-center align-items-center b-r-custom my-2 mx-4">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/news.svg" width="200px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h2 card-title   text-white font-weight-bold">Noticias</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="?c=Noticias&m=showNews">Acceder</a>
                      </div>
                    </div>


                    <div class="b-custom rounded card d-flex justify-content-center align-items-center b-r-custom my-2 mx-4">
                        <div class="div-certificate mt-5 ">
                          <img class="img-animation" src="assets/svg/events.svg" width="200px" height="120px">
                        </div>
                      <div class="card-body d-flex justify-content-center align-items-center flex-column">
                        <p class="h2 card-title   text-white font-weight-bold">Eventos</p>
                      
                        <a data-hover="Acceder" class="text-decoration-none button--scale-text  font-weight-bold  bg-dark text-white rounded-lg" href="?c=Eventos&m=showEvents">Acceder</a>
                      </div>
                    </div>
                 
                </div>  
      </main>

<!-- ? End Main -->

<?php  require_once 'layout/footer.php'; ?>