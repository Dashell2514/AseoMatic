<?php require_once 'layout/header.php'?>


        <main>

            <!-- ? Section Services -->
            <section id="servicios" class="servicios text-center  ">
                <h2 class="display-4 text-dark font-weight-bold ">Servicios</h2>
                <p class="h4  mt-3 mb-5"> Ofrecemos  servicios integrales para nuestros clientes</p>
                <div id="carouselServices" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner mt-3 mb-5 ">
                      <div class="carousel-item active" data-interval="3000">
                        <div class="row mb-4">
                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-shower text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Lavado De Fachada
                                </div>
                                <p class="mt-2 text-secondary ">
                                   
                                    Realizamos lavado a presión (con o sin químicos según el trabajo) para garantizar una limpieza completa, usando maquinaria industrial
                                </p>
                            </div>


                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-paint-roller   text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Pintura
                                </div>
                                <p class="mt-2 text-md-secondary ">
                                   
                                    Usamos pintura Pintuco para interiores y exteriores, realizamos trabajos Residencial y comercial, incluyendo trabajos en alturas
                                </p>
                            </div>


                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-hammer text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Remodelacion
                                </div>
                                <p class="mt-2 text-secondary  ">
                                    Tenemos material, equipo certificado, personal calificado y con conocimiento para ejecutar sus obras y sus remodelaciones 
                                </p>
                            </div>


                       
                        </div>


                      </div>
                      <div class="carousel-item" data-interval="3000">
                        
                        <div class="row ">
                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-tint text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Hidrolavado​
                                </div>
                                <p class="mt-2 text-secondary ">
                                    Hidrolavado a presión con equipo industrial, utilizando agua fría o caliente, con químicos o jabón que nuestros clientes requieran para el lavado de superficies.
                                </p>
                            </div>


                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-pump-soap text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Prevención Desinfección 
                                </div>
                                <p class="mt-2 text-secondary">
                                    Servicio de prevención y desinfección de superficies con riesgo de contagio usando desinfectantes autorizados.
                                </p>
                            </div>


                            <div class="col-md px-md-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="text-dark bg-primary  p-4 rounded-circle">
                                    <i class="fas fa-user-tie text-white fa-5x"></i>
                                </div>
                                <div class="h4 text-dark font-weight-bold mt-4">
                                    Trabajos Profesionales
                                </div>
                                <p class="mt-2 text-secondary  ">
                                    Ofrecemos nuestros servicios a pequeñas, grandes empresas y Gobierno Con todas nuestras garantías, licencias y personal capacitado.
                                </p>
                            </div>


                       
                        </div>


                      </div>



                      </div>
                      <a class="carousel-control-prev" href="#carouselServices" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselServices" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                 
                  </div>
            </section>

            <!-- ? End Section Services -->

            
 
            <hr>

            <!-- ? Section Notices -->
            <section class="noticias">
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <h2 class="text-center font-weight-bold display-4">Noticias</h2>
                        <div class="owl-carousel owl-theme breadcrumb" id="noticias_row">
                        <?php 
                            foreach(Administrador::allTable('noticias') as $noticia){ ?>
                            <div class="card item ">
                                <img src="<?php echo $noticia->imagen_noticia?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold"><?php echo $noticia->titulo_noticia?></h5>
                                    <p class="card-subtitle"><?php echo Login::limitar_cadena($noticia->descripcion_noticia,80,'...')?></p>
                                    <a data-id="<?php echo $noticia->id_noticia?>" data-tipo="noticia"data-toggle="modal" data-target="#ModalNews" class="btn btn-grow">Leer Mas</a>
                                </div>
                            </div>

                            <?php }?> 

                        </div>
                    </div>
                </div>
            </section>
            <!-- ? End Section Notices -->


            <!-- ? Modal Show-->
<div class="modal fade w-100" id="ModalNews" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog   modal-dialog-scrollable">

  <div class="modal-content  bg-dark text-white">
    <div class="modal-header border-0 b-custom">
      <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
      text-white" id="showModal"></h5>
      <button type="button" id="cerrarModalShowUsuario" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
                    
       
        <div class="card mb-3">
          <img  id="show_prev_img" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-body font-weight-bold text-capitalize" id="show_title" ></h5>
    
            <p class="card-text text-secondary" id="show_description"></p>
            
            
            <small class="text-muted text-capitalize" id="show_date" ></small>
          </div>
        </div>



        <div class="d-flex justify-content-end align-items-center">
              <button type="button"  class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cerrar</button>
        </div>


    </div>
  </div>
</div>
</div>
  <!-- ? Modal End Show-->

            <!-- ? Section Events -->
            <section class="eventos">
                <div class="row m-0 p-0">
                    <div class="col m-0 p-0">
                        <h2 class="text-center font-weight-bold display-4">Eventos</h2>
                        <div class="owl-carousel owl-theme breadcrumb " id="eventos_row">
                            <?php 
                            foreach(Administrador::allTable('eventos') as $evento){ ?>
                            <div class="card item ">
                                <img src="<?php echo $evento->imagen_evento?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold"><?php echo $evento->titulo_evento?></h5>
                                    <p class="card-subtitle"><?php echo Login::limitar_cadena($evento->descripcion_evento,100,'...')?></p>
                                    <a data-id="<?php echo $evento->id_evento?>" data-tipo="evento"data-toggle="modal" data-target="#ModalNews" class="btn btn-grow">Leer Mas</a>
                                </div>
                            </div>

                            <?php }?> 

                         
                        </div>
                    </div>
                </div>
            </section>
            <!-- ? End Section Events -->



          <!-- ? About us -->
            <section class="sobre_nosotros " id="nosotros">
                <div class="container ">
                    <div class="row">
                        <div class="col-12 ">
                            
                            <h2 class="text-center display-4 mb-5 font-weight-bold">Quienes Somos</h2>
                          
                        </div>
                    </div>
         </div>
        <div class="container-fluid breadcrumb  ">
            <p class="text-muted text-center h5 w-75 mx-auto mt-4 ">Somos una empresa de Aseo, servicios generales, mantenimiento, jardinería y más.
                MACROASEO SAS, somos una empresa de servicios integrales que involucra recurso humano, insumos y maquinaria, estamos enfocados en el Outsourcing de Aseo, Limpieza, Cafetería, jardinería y Mantenimiento en general de sus instalaciones..</p>
            <div class="row container mx-auto  mb-5">
                <div class="mt-5 col-lg-6 col-sm-12 col-md-6  d-flex flex-column justify-content-center align-items-center text-secondary">
                    <img src="assets/svg/build.svg" class="w-50 img-animation" alt="" >
                    <h1 >Misión</h1>
                    <p class="mr-3 text-center h6 font-weight-bold">Desarrollar nuestras actividades cotidianas de servicio con calidad y esmero en la búsqueda de construir un mejor futuro, rentable y sostenible, mediante acciones responsables con el medio ambiente.</p>
                </div>
    
                <div class="mt-5 col-lg-6 col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-secondary mx-0">
                    <img src="assets/svg/vision.svg" class="w-50 img-animation" alt="" >
                    <h1 >Visión</h1>
                    <p class=" text-center  h6  font-weight-bold">El posicionamiento de Servicios y Suminitros S.A.S como un importante referente en la prestación del servicio de Aseo y Limpieza general dentro del mercado colombiano y a largo plazo tener un alcance en operaciones internacionales.</p>
                </div>
            </div>
        </div>
            </section>
    	
    		<!-- ? End About Us -->

        
          </div>

          
      </div>
    </div>

    <!-- ? Contact -->

    
  
    	<section class="contact" id="contactanos">
            <div class="container ">
            	    <h2 class="text-center display-4 font-weight-bold">Formulario de Contacto</h2>
            
            	    <form method="POST" id="form_contact"class="my-5" >
            	          <div class="form-group row m-3">
            	             <div class="col-12 col-md-6">
            	                <label for="nombre_contact" class="ml-2" >Nombre</label>
            	                <input type="text" id="nombre_contact" name="nombre_contact"class="form-control" placeholder="pepito.">
            	            </div>
            	          
              
            	             <div class="col-12 col-md-6">
            	                <label for="apellido_contact" class="ml-2" >Apellido</label>
            	                <input type="text" id="apellido_contact" name="apellido_contact" class="form-control" placeholder="Gonzales...">
            	            </div>
              
            	          </div>
              
            	            <div class="form-group row m-3">
              
            	              <div class="col-12 col-md-6">
            	                <label for="email_contact" >Correo</label>
            	                <input type="text" name="email_contact" id="email_contact" class="form-control" placeholder="pepitoMan@example.com.-.">
            	              </div>
              
            	              <div class="col-12 col-md-6">
            	                <label for="asunto_contact" >Asunto</label>
            	                <input type="text" name="asunto_contact" id="asunto_contact" class="form-control" placeholder="Escriba su asunto ..">
            	              </div>
            	               
            	            </div>
              
            	            <div class="form-group row m-3">
            	              <div class="col-12  col-md-6">
            	                 <label for="message_contact"  >Mensaje</label>
            	                  <textarea name="message_contact" id="message_contact"  class="form-control form_contact_textarea"></textarea>
            	              </div>
            	                <div class="col-5 m-3">
            	                    <label for="">Sexo</label>
            	                      <div class="form-check">
            	                        <div class="form-check-label ">
            	                         <input class="form-check-input " name="genero_contact"  type="radio">Hombre
            	                        </div>
            	                      </div>
            	                      <div class="form-check">
            	                        <label class="form-check-label ">
            	                          <input class="form-check-input " name="genero_contact" type="radio">Mujer
            	                        </div>        
            	               </div>
            	             </div>
              
            	              <div class="form-group row">
            	                <div class="col-12 text-center">
            	                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
            	                        <input type="checkbox" class="custom-control-input" name="terminos_contact" id="terminos_contact">
            	                        <label class="custom-control-label"  for="terminos_contact">Acepto Terminos y Condiciones</label>
            	                    </div>
            	                 </div>
            	                    
            	              </div>
            	              <div class="row justify-content-center">
            	                <div class="col-4 ">
            	                    
            	                    <label for="form_contacto" class="font-weight-bold w-100 p-2  btn-custom text-center">Enviar</label>
            	                    <input type="submit" name="form_contacto" id="form_contacto" class="input-login">
              
            	               </div>
            	             </div>
              
              
              
              
            	    </form>
            	  </div>
        </section>

    <!-- ? End Contact -->

         <!-- ? Ubicacion-->


            <div class="container-fluid my-5 bg-breadcrumb px-5 " >
                <div class="container ">
                    <div class="card mb-8" >
                        <div class="row  bg-breadcrumb">
                            <div class="col-md-8 ">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.0789354781027!2d-74.10034568523749!3d4.756301996545665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f85b58db02769%3A0xd045ed993b5e814e!2sServicios%20y%20Suministros%20La%20Equidad!5e0!3m2!1ses-419!2sco!4v1595881917795!5m2!1ses-419!2sco" width="500" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="card-img"></iframe>
                            </div>
    
    
                            <div class="col-md-4">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold  text-center h2 ">Ubicación</h5>
                                    <p class="card-text"> 
                                    <ul class=" list-unstyled d-flex justify-content-center flex-column align-items-center"  >
                                    <li class="font-weight-bold ">Dirección</li>
                                    <li>Cra. 113b ##152b-37</li>
                                    <li>Bogotá, Cundinamarca</li>
                                    <li class="font-weight-bold ">Teléfono</li>
                                    <li>+57 316 3883950</li>
                                    <li class="font-weight-bold  mt-3">Horario de Atencion</li>
                                    <li>lun.: 7:00–17:00</li>
                                    <li>mar.: 7:00–17:00</li>
                                    <li>mié.: 7:00–17:00</li>
                                    <li>jue.: 7:00–17:00</li>
                                    <li>vie.: 7:00–17:00</li>
                                    <li>sáb.: 8:00–14:00</li>
                                    <li>dom.: Cerrado</li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
  
  
        <!-- ? End Ubicacion-->
  



        </main>

       
        <footer class="container-fluid mt-5 ">
            <div class=" container mx-auto text-center text-md-left row m-0 p-0 ">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12   ">
                    <ul class="list-unstyled">
                        <li class="d-flex flex-column  justify-content-center  ">
                            <h4 class="font-weight-bold" >HighLights</h4 >
                            <a href="" class="d-block text-decoration-none text-dark">Nuestra Historia</a>
                            <a href="" class="d-block text-decoration-none text-dark">Precios</a>
                            <a href="" class="d-block text-decoration-none text-dark">Contactenos</a>
                            <a href="" class="d-block text-decoration-none text-dark">Trabajos</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12  ">
                    <ul class="list-unstyled">
                        <li class="d-flex flex-column  justify-content-center  ">
                            <h4 class="font-weight-bold">Recursos</h4>
                            <a href="" class="d-block text-decoration-none text-dark">Preguntas Frecuentes</a>
                            <a href="" class="d-block text-decoration-none text-dark">Blog</a>
                            <a href="" class="d-block text-decoration-none text-dark">Soporte</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-12   ">
                    <ul class="list-unstyled">
                        <li class="d-flex flex-column  justify-content-center  ">
                            <h4 class="font-weight-bold">Legal</h4>
                            <a href="" class="d-block text-decoration-none text-dark">Privacidad</a>
                            <a href="" class="d-block text-decoration-none text-dark">Terminos de Servicio </a>
                            <a href="" class="d-block text-decoration-none text-dark">Seguridad</a>
                        </li>
                    </ul>
                </div>


                <div class="  col-lg-3 col-md-3 col-sm-6 col-12   ">
                    <ul class="list-unstyled social-list ">

                        <h4 class="font-weight-bold">Siguenos</h4>
                        <li><a href="https://www.instagram.com/"><img src="assets/svg/bxl-instagram.svg" alt=""></a> 
                            <a href="https://www.facebook.com/"><img src="assets/svg/bxl-facebook-square.svg" alt=""></a> 
                            <a href="https://twitter.com/"><img src="assets/svg/twitter.svg" alt=""></a>

                        <li>Servicios y Suministros La Equidad S.A.S</li>
                        <li>Cra. 113b ##152b-37</li>
                        <li>Bogotá, Cundinamarca</li>
                        <li>+57 316 3883950</li>
                        <li><a href="">ServiciosSas@sas.com</a></li>
                    </ul>
                </div>


            </div>

            <hr>
            <div class="row">
                <div class="col">
                    <div class="container d-flex  flex-column align-items-center justify-content-center ">
                        <h2 class="font-weight-bold mb-4 mt-2">
                            Obten la App
                        </h2>

                        <div class="section-intro">
                            descarga la app ahora Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem illum
                            ut in, maiores sed vitae eius laborum atque nulla, sapiente reprehenderit rem perspiciatis
                            omnis, tempore enim reiciendis dolor maxime dicta
                        </div>

                        <div class="pt-5">
                           <a href="https://play.google.com/store"> <img src="assets/svg/google-play.svg" alt="" class="svg-google img-fluid "></a>
                        </div>

                        <p class="mt-5">CopyRight &copy 2020 David Juajinoy :D. All rights Reserved </p>

                    </div>
                </div>
            </div>

        </footer>



        <!-- ? Modal Login -->
<div class="modal fade  " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div  class="modal-dialog ">
      <div class="modal-content modal-custom bg-dark text-white">
    
        <div class="modal-body w-100 mx-auto">
            <div class="modal-title text-center my-3" id=""><img  class="img-animation img-login" src="assets/svg/login.svg" alt=""></div>
            
            <form  method="POST" class="mb-3">
                <div class="form-group">
                  <label for="nombre_usuario">Nombre de Usuario</label>
                  <input type="text " name="nombre_usuario" id="nombre_usuario" class="form-control bg-grey-dark" placeholder="david@mail.com" >
                  
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control bg-grey-dark" placeholder="12345" >
                    
                  </div>

               <a href="" class="text-decoration-none my-2 d-block text-white"> ¿ olvido su constraseña ?</a>
              
                  <label for="loginBtn" class="font-weight-bold w-100 p-2  btn-custom-default text-center">Login</label>
                <input  name="loginBtn" type="submit" id="loginBtn" class="input-login">

                
            </form>
        </div>
        
      </div>
    </div>
  </div>

        <!-- ? End Modal  Login-->

  


<?php  require_once 'layout/footer.php' ?>




