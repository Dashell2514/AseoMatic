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
              <th colspan="2">Evento</th>
              <th colspan="2">Fecha de Publicación</th>
              <th>Autor</th>
              <th>Opciones</th>
              <th class="th-opacity b-custom"><i class="fa fa-plus" data-toggle="modal" data-target="#ModalAddEvents"></i></th>
            </tr>
          </thead>


          <tbody id="tablaAllEvents">
            


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
<div class="modal fade" id="ModalAddEvents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Agregar Evento</h5>
        <button type="button" id="cerrarModalNoticia" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class=" col-sm-12">
                <div class="form-group">
                  <label for="titulo_evento" class="text-shadow-1 text-custom text-capitalize">Titulo de Evento</label>
                  <input type="text" class="form-control bg-white input-custom" name="titulo_evento" placeholder="Juanito salio a pescar y salio Pescado" id="titulo_evento">
                </div>

                <div class="form-group">
                  <label for="descripcion_evento" class="text-shadow-1 text-custom text-capitalize">descripcion De Evento</label>
                  <textarea name="descripcion_evento" id="descripcion_evento" class="form-control" cols="20" rows="4" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
                </div>
              

               

            </div>


            
            <div class="col-md-6 col-sm-12">
                <div class="card bg-dark border-0 text-white "  >
                  <img  id="prev-img" class="card-img rounded-circle size-img_user_form"   alt="">
                  <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                    <label data-hover="Seleccionar Img" for="event_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                    <input type="file" name="event_img" id="event_img" class="img-profile__input-file">
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
              <input type="hidden" name="fecha_evento" id="fecha_evento"value="<?php echo date("Y-m-d") ?>">

          </div>

          <div class="text-right">
            <button id="GuardarEvento" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
           <button type="button" id="CancelarEvento" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Create-->

<!-- ? Modal Update-->
<div class="modal fade w-100" id="ModalUpdateEvents" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg  modal-dialog-scrollable">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="UpdateEventModal">Actualizar Evento</h5>
        <button type="button" id="cerrarModalUpdateEvent" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class=" col-sm-12">
            <input type="hidden" name="update_id_evento" id="update_id_evento">
                <div class="form-group">
                  <label for="update_titulo_evento" class="text-shadow-1 text-custom text-capitalize">Titulo de evento</label>
                  <input type="text" class="form-control bg-white input-custom" name="update_titulo_evento" placeholder="Juanito salio a pescar y salio Pescado" id="update_titulo_evento">
                </div>

                <div class="form-group">
                  <label for="update_descripcion_evento" class="text-shadow-1 text-custom text-capitalize">descripcion De evento</label>
                  <textarea name="update_descripcion_evento" id="update_descripcion_evento" class="form-control" cols="20" rows="4"></textarea>
                </div>
              

            

            </div>
            


            <div class="col-md-6 col-sm-12">
                <div class="card bg-dark border-0 text-white "  >
                  <img  id="update_prev-img" class="card-img rounded-circle size-img_user_form"   alt="">
                  <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                    <label data-hover="Seleccionar Img" for="update_event_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                    <input type="file" name="update_event_img" id="update_event_img" class="img-profile__input-file">
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

            <input type="hidden" name="update_fecha_evento" id="update_fecha_evento"value="<?php echo date("Y-m-d") ?>">

          </div>

          <div class="text-right">
            <button id="ActualizarEvento" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
            <button type="button" id="CancelarActualizarEvento" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Update-->


<!-- ? Modal Show-->
<div class="modal fade w-100" id="ModalShowEvents" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog   modal-dialog-scrollable">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="showModal">Evento</h5>
        <button type="button" id="cerrarModalShowEvento" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                      
       
          <div class="card mb-3">
            <img  id="show_prev_img" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-body font-weight-bold" id="show_titulo_evento"></h5>
              <p class="card-text text-secondary " id="show_descripcion_evento"></p>
              
              <small class="text-muted text-capitalize" id="show_fecha_evento"></small>
            </div>
          </div>



          <div class="d-flex justify-content-end align-items-center">
                <button type="button" id="CancelarShowEvento" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cerrar</button>
          </div>

 
      </div>
    </div>
  </div>
</div>
    <!-- ? Modal End Show-->
    
              
    
<?php require_once 'layout/footer.php'; ?>