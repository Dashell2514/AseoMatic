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
                                <img class="img-animation" src="assets/svg/profile.svg" width="50px">
                            </i>Perfil</p>
                        </div>
                        <div id="queryCardW" class="w-100 card-body flex-column  d-flex justify-content-center align-items-center py-0">

                            <div class="container mb-5  b-r-custom  bg-dark">
                               
                            <form method="POST">
                                <div class="row mt-3  ">
                                  <input type="hidden" name="token_perfil" id="token_perfil" >
                                    
                                    <div class="col-sm-12 col-lg-5 d-flex justify-content-center align-items-center
                                    ">
                                        <div class="img-profile w-75">
                                            <img src="" class="img-fluid rounded-circle" alt="" id="img_perfil">
                                            <div class="text-center d-flex justify-content-center align-items-center mt-3 mb-4 ">
                                                <label data-hover="Cambiar Foto" for="change_img" class=" w-75 text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg" >Cambiar Foto</label>
                                                <input type="file" name="change_img" id="change_img" class="img-profile__input-file"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-7 d-flex flex-column justify-content-center align-items-center font-weight-bold">
                                        <div class="form-group w-75 text-white   ">
                                          <label for="nombre_perfil">Nombres</label>
                                          <input type="name" disabled name="nombre_perfil" id="nombre_perfil" class="form-control disabled text-capitalize " placeholder=""  >
                                        </div>

                                        <div class="form-group w-75 text-white">
                                            <label for="apellidos_perfil">Apellidos</label>
                                            <input type="name" disabled name="apellidos_perfil" id="apellidos_perfil" class=" form-control disabled text-capitalize  " placeholder=""  >
                                          </div>


                                          <div class="form-group w-75 text-white">
                                            <label for="email_perfil">Correo</label>
                                            <input type="name"disabled name="email_perfil" id="email_perfil" class="form-control disabled " placeholder=""  >
                                          </div>

                                          <div class="form-group w-75 text-white">
                                            <label for="password_perfil">Contraseña</label>
                                            <input type="password" name="password_perfil" id="password_perfil" class="form-control " placeholder=""  >
                                          </div>

                                          <div class="form-group w-75 text-white">
                                            <label for="confirm_password_perfil">Confirmar Contraseña</label>
                                            <input type="password" name="confirm_password_perfil" id="confirm_password_perfil" class="form-control " placeholder=""  >
                                          </div>
                                    </div>

                                    </div>
                                    <div class="text-center row mt-3 mb-4 ">
                                        <div  class="col-sm-12 col-md-6 " >
                                          <label data-hover="Cambiar Imagen"   class=" w-100  text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg">Cambiar Imagen</a>
                                            <input  class="form-profile__input-file" id="updateProfile">
                                        </div>


                                          <div  class="col-sm-12 col-md-6">
                                            <label data-hover="Cambiar Contraseña"   class=" w-100  text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg">Cambiar Contraseña</a>
                                            <input  class="form-profile__input-file" data-toggle="modal" data-target="#updatePassword" >
                                          </div>
                                          
                                    </div>


                                    

                               
                            </form>

                                
                            </div>
                           
                         
                          
                        </div>


                        
                    
                        
                       
                       
                      </div>
                          
                    </div>
                  </div>
                
                </div>       
        <!-- * End Cards-->
       </main>

       <!-- ? End Main -->


<!-- ? Modal -->
<div class="modal fade" id="updatePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1 text-custom">Cambiar Contraseña </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="validate_password" class=" text-custom " >Contraseña Anterior</label>
                        <input type="password" class="form-control bg-white input-custom  "required  id="validate_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password" class=" text-custom " >Contraseña Nueva</label>
                        <input type="password" class="form-control bg-white input-custom  "required  id="new_password">
                    </div>
                   
                    <div class="d-flex justify-content-start align-items-center">
                        <button  type="submit" class="mr-3 btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg" id="btnupdatePassword">Actualizar Contraseña</button>

                        <button type="button" class=" btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- ? End Modal -->

<?php require_once 'layout/footer.php'?>