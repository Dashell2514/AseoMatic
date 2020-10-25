<?php require_once 'layout/header.php'; ?>


<main class="main w-100">

  <div class="container mt-5">
    <div class="row w-100 mx-0">

      <div class="col-12 ">
        <table class="table  w-100  table-responsive-lg">
        <input type="text" id="buscador" class="form-control text-white bg-dark " placeholder="Buscador">

          <thead class="thead-dark">
            <tr>
              <th colspan="1">#</th>
              <th colspan="2">Noticia</th>
              <th colspan="2">Fecha de Publicación</th>
              <th>Autor</th>
              <th>Opciones</th>
              <th class="th-opacity b-custom"><i class="fa fa-plus" data-toggle="modal" data-target="#ModalAddNew"></i></th>
            </tr>
          </thead>


          <tbody id="tablaAllNews">
            


          </tbody>
        </table>

        <!-- Paginacion -->
            <nav >
              <ul class="pagination d-flex justify-content-end" id="pagination">
              </ul>
            </nav>

      </div>
    </div>
  </div>
  <!-- * End Table-->
</main>


<!-- ? Modal Create-->
<div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Agregar Noticia</h5>
        <button type="button" id="cerrarModalNoticia" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class=" col-sm-12">
                <div class="form-group">
                  <label for="titulo_noticia" class="text-shadow-1 text-custom text-capitalize">Titulo de Noticia</label>
                  <input type="text" class="form-control bg-white input-custom" name="titulo_noticia" placeholder="Juanito salio a pescar y salio Pescado" id="titulo_noticia">
                </div>

                <div class="form-group">
                  <label for="descripcion_noticia" class="text-shadow-1 text-custom text-capitalize">descripcion De noticia</label>
                  <textarea name="descripcion_noticia" id="descripcion_noticia" class="form-control" cols="20" rows="4" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
                </div>
              

              

              </div>

            <div class="col-md-6 col-sm-12">
                <div class="card bg-dark border-0 text-white "  >
                  <img  id="prev-img" class="card-img rounded-circle size-img_user_form"   alt="">

                  <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                          <label data-hover="Seleccionar Img" for="new_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                          <input type="file" name="new_img" id="new_img" class="img-profile__input-file">
                  </div>
                </div>
            </div>


     
            <div class="form-group col-md-6 col-sm-12">
                  <label for="fk_usuario" class="text-shadow-1 text-custom text-capitalize">Autor</label>
                  <select name="fk_usuario" id="fk_usuario" class="form-control ">
                    <option value="" selected="true">-- Seleccione --</option>
                    <?php foreach (Administrador::allTable('usuarios') as $user) { ?>
                      <option value="<?php echo $user->id_usuario ?>"><?php echo $user->nombres." ".$user->apellidos ?></option>
                    <?php } ?>
                  </select>
            </div>


            <input type="hidden" name="fecha_noticia" id="fecha_noticia"value="<?php echo date("Y-m-d") ?>">

          </div>

          <div class="text-right">
            <button id="GuardarNoticia" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
           <button type="button" id="CancelarNoticia" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Create-->

<!-- ? Modal Update-->
<div class="modal fade w-100" id="ModalUpdateNews" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg  modal-dialog-scrollable">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="UpdateNewModal">Actualizar Noticia</h5>
        <button type="button" id="cerrarModalUpdateNew" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class=" col-sm-12">
            <input type="hidden" name="update_id_noticia" id="update_id_noticia">
                <div class="form-group">
                  <label for="update_titulo_noticia" class="text-shadow-1 text-custom text-capitalize">Titulo de Noticia</label>
                  <input type="text" class="form-control bg-white input-custom" name="update_titulo_noticia" placeholder="Juanito salio a pescar y salio Pescado" id="update_titulo_noticia">
                </div>

                <div class="form-group">
                  <label for="update_descripcion_noticia" class="text-shadow-1 text-custom text-capitalize">descripcion De noticia</label>
                  <textarea name="update_descripcion_noticia" id="update_descripcion_noticia" class="form-control" cols="20" rows="4"></textarea>
                </div>
              

           

            </div>


            
            
              <div class="col-md-6 col-sm-12">
                <div class="card bg-dark border-0 text-white "  >
                      <img  id="update_prev-img" class="card-img rounded-circle size-img_user_form"   alt="">
                      <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                        <label data-hover="Seleccionar Img" for="update_new_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                        <input type="file" name="update_new_img" id="update_new_img" class="img-profile__input-file">
                      </div>
                </div>
              </div>


              <div class="form-group col-md-6 col-sm-12">
                    <label for="update_fk_usuario" class="text-shadow-1 text-custom text-capitalize">Autor</label>
                    <select name="update_fk_usuario" id="update_fk_usuario" class="form-control ">
                      <?php foreach (Administrador::allTable('usuarios') as $user) { ?>
                        <option value="<?php echo $user->id_usuario ?>"><?php echo $user->nombres." ".$user->apellidos ?></option>
                      <?php } ?>
                    </select>
              </div>
              
            <input type="hidden" name="update_fecha_noticia" id="update_fecha_noticia"value="<?php echo date("Y-m-d") ?>">

          </div>

          <div class="text-right">
            <button id="ActualizarNoticia" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
           <button type="button" id="CancelarActualizarNoticia" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Update-->


<!-- ? Modal Show-->
<div class="modal fade w-100" id="ModalShowNews" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog   modal-dialog-scrollable">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="showModal">Noticia</h5>
        <button type="button" id="cerrarModalShowUsuario" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                      
       
          <div class="card mb-3">
            <img  id="show_prev_img" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-body font-weight-bold text-capitalize" id="show_titulo_noticia"></h5>
      
              <p class="card-text text-secondary" id="show_descripcion_noticia"></p>
              
              
              <small class="text-muted text-capitalize" id="show_fecha_noticia"></small>
            </div>
          </div>



          <div class="d-flex justify-content-end align-items-center">
                <button type="button" id="CancelarShowUsuario" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cerrar</button>
          </div>

 
      </div>
    </div>
  </div>
</div>
    <!-- ? Modal End Show-->
    
              
    
    
    <?php require_once 'layout/footer.php'; ?>