<?php require_once 'layout/header.php'; ?>


<main class="main w-100">

  <!-- * Table -->
  <div class="container mt-5">
    <div class="row w-100 mx-0">

      <div class="col-12 ">
        <table class="table  w-100  table-responsive-lg">
        
            <input type="text" id="buscador" class="form-control text-white bg-dark " placeholder="Buscador">
          <thead class="thead-dark">
            <tr>
              <th colspan="1">#</th>
              <th colspan="2">Documento</th>
              <th colspan="2">Nombres</th>
              <th>Salario</th>
              <th>Desde</th>
              <th>Hasta</th>
              <th>Concepto Nomina</th>
              <th class="th-opacity b-custom"><i class="fa fa-plus" data-toggle="modal" data-target="#ModalAddNomina"></i></th>
            </tr>
          </thead>


          <tbody id="tablaAllUser">
            


          </tbody>

 
        </table>
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
<div class="modal fade" id="ModalAddNomina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Ingreso Nomina</h5>
        <button type="button" id="cerrarModalUsuario" tabindex="-1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="row">
            

            <div class="col-md-12 mt-4 col-sm-12">
                <div class="form-group">
                  <label for="usuario" class="text-shadow-1 text-custom">Usuario</label>
                  <select name="usuario" id="usuario" class="form-control text-capitalize" >
                      <?php foreach (Administrador::allTable("usuarios") as $usuario) { ?>
                          
                      
                      <option value="<?php $usuario->id_usuario?>"><?php echo $usuario->nombres." ".$usuario->apellidos ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>



          </div>

          <div class="row">
      
             <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_de" class="text-shadow-1 text-custom">Fecha Desde</label>
                <input type="date" name="fecha_de" id="fecha_de" class="form-control">
              </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_hasta" class="text-shadow-1 text-custom">Fecha 
                    Hasta
                </label>
                <input type="date" name="fecha_hasta" id="fecha_hasta" class="form-control">

              </div>
            </div>
          </div>


          <div class="row">
            <div class="form-group col-md-12 col-lg-12 col-sm-12">
              <label for="cargo" class="text-shadow-1 text-custom">Concepto de nomina</label>
              <select name="cargo" id="cargo" tabindex="7"class="form-control bg-white">
                <option value=""  selected="true">-- Seleccione --</option>
                
                  <option value="">ID: DESCRIPCION</option>
                  <option value="">ID: DESCRIPCION</option>
                  <option value="">ID: DESCRIPCION</option>
                
              </select>
            </div>
          </div>

     

          <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d")  ?>">




          <div class="text-right my-2">
            <button id="GuardarUsuario" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" type="submit">Aceptar</button>
            <button type="button" id="CancelarUsuario" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Create-->


    
              
    
<?php require_once 'layout/footer.php'; ?>