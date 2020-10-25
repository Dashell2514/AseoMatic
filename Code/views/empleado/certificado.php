<?php require_once 'layout/header.php'?>

 <!-- ? Main -->

 <main class="main">
        <!-- * Cards -->
          <div  id="queryW" class="container mt-5 px-5 d-flex justify-content-center align-items-center ">
                <div class="row w-100">
                  <div class="col-lg-12 card-div col-md-12 col-sm-12 mb-3">
                    <div class="b-custom rounded card medium background d-flex justify-content-center align-items-center b-r-custom">
                        <div class="card-title mt-3">
                            
                            <p class="h3 card-title text-white font-weight-bold text-center text-shadow " ><i>
                                <img class="img-animation" src="assets/svg/certificate.svg" width="50px">
                            </i>Certificado Laboral</p>
                        </div>
                        <div id="queryCardW" class="w-75 card-body flex-column mt-2 d-flex justify-content-center align-items-center ">

                            <div class="container  b-r-custom  bg-dark">
                                <div class="row text-white  mt-3 ">
                                    <div class="col-6 text-center">
                                        <p class="h5 font-weight-bold text-shadow-1 ">Nombres</p>
                                        <p class="h7 text-capitalize "><?php echo $_SESSION['EMPLEADO']->nombres?></p>
                                    </div>

                                    <div class="col-6 text-center">
                                        <p class="h5 font-weight-bold text-shadow-1">Apellidos</p>
                                        <p class="h7 text-capitalize "><?php echo $_SESSION['EMPLEADO']->apellidos?></p>
                                    </div>
 
                                </div>

                                <div class="row text-white ">
                                    <div class="col-6 text-center">
                                        <p class="h5 font-weight-bold text-shadow-1">Direccion</p>
                                        <p class="h7 text-capitalize">Calle 74A sur N88 D 36</p>
                                    </div>

                                    <div class="col-6 text-center">
                                        <p class="h5 font-weight-bold text-shadow-1"><?php echo $_SESSION['EMPLEADO']->tipo_documento ?></p>
                                        <p class="h7 text-capitalize"><?php echo $_SESSION['EMPLEADO']->numero_documento?></p>
                                    </div>
 
                                </div>

                                <div class="row text-white mb-3 ">
                                    <div class="col-12 text-center d-flex justify-content-center align-items-center">
                                        <a data-hover="Editar Informacion" class=" w-75  text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg" data-toggle="modal" data-target="#informationModal">Editar Informacion</a>
                                    </div>

                                </div>

                                
                            </div>
                           
                         
                          
                        </div>


                        
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <a data-hover="Generar Certificado" class="text-decoration-none button--scale-text w-100 font-weight-bold  bg-dark text-white rounded-lg" href="#">Generar Certificado</a>
                        </div>
                        
                       
                       
                      </div>
                          
                    </div>
                  </div>
                
                </div>       
        <!-- * End Cards-->
       </main>

       <!-- ? End Main -->

       
           <!-- ? Modal -->
<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header border-0 b-custom">
          <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1 text-white" id="informationModal">Editar Informacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                <div class="form-group">
                  <label for="nombres" class="text-shadow-1 text-custom " >Nombres</label>
                  <input type="name" class="form-control bg-white input-custom  " name="nombres" required  id="nombres" >
                </div>
                <div class="form-group">
                  <label for="apellidos" class="text-shadow-1 text-custom">Apellidos</label>
                  <input type="name" class="form-control bg-white input-custom"  name="apellidos" required id="apellidos">
                </div>

                <div class="form-group">
                    <label for="direccion " class="text-shadow-1 text-custom">Direccion</label>
                    <input type="adress" class="form-control bg-white input-custom" name="direccion" required id="direccion" >
                  </div>
                  <div class="form-group">
                    <label for="cedula" class="text-shadow-1 text-custom">C.C</label>
                    <input type="number" class="form-control bg-white input-custom" name="cedula" required id="apellidos">
                  </div>
               
                  <div class="d-flex justify-content-start align-items-center">
                    <button  type="button" class="mr-3 btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg">Aceptar</button>

                    <button type="button" class=" btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
                  </div>
              </form>
        </div>
     
      </div>
    </div>
  </div>

  <!-- ? End Modal -->

<?php require_once 'layout/footer.php'?>