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
              <th>Opciones</th>
              <th class="th-opacity b-custom"><i class="fa fa-plus" data-toggle="modal" data-target="#ModalAddNomina"></i></th>
            </tr>
          </thead>


          <tbody id="tablaAllNominas">
            


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
        <button type="button"  data-class="nomina_cancel" tabindex="-1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
          <div class="row">
            

            <div class="col-md-12 mt-4 col-sm-12">
                <div class="form-group">
                  <label for="usuario" class="text-shadow-1 text-custom">Usuario</label>
                  <select name="usuario" tabindex="1" id="usuario" class="form-control text-capitalize" >
                  <option value="" selected="true">---Seleccione---</option>
                      <?php foreach (Administrador::allTable("usuarios") as $usuario) { ?>
                      <option value="<?php echo $usuario->id_usuario?>"><?php echo $usuario->nombres." ".$usuario->apellidos ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>



          </div>

          <div class="row">
      
             <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_de" class="text-shadow-1 text-custom">Fecha Desde</label>
                <input type="date"tabindex="2" name="fecha_de" id="fecha_de" class="form-control">
              </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_hasta" class="text-shadow-1 text-custom">Fecha 
                    Hasta
                </label>
                <input type="date" tabindex="3" name="fecha_hasta" id="fecha_hasta" class="form-control">

              </div>
            </div>
          </div>

      
        <div class="row">
                   <!--Descripcion-->
          <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                  <label for="descripcion_nomina" class="text-shadow-1 text-custom text-capitalize">Descripcion Nomina</label>
                  <textarea name="descripcion_nomina" id="descripcion_nomina" class="form_contact_textarea form-control" cols="20" rows="2" tabindex="4" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
           </div>
          <!--FIN Descripcion-->
           <!--Asiento contable-->
          <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                <label class="text-shadow-1 text-custom text-capitalize">Asiento Contable</label>
                <select name="contable" tabindex="5" id="contable" tabindex="7" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('asiento_contable') as $asiento_contable) { ?>
                    <option value="<?php echo $asiento_contable->id_asiento_contable ?>"><?php echo $asiento_contable->asiento_contable ?></option>
                  <?php } ?>
                </select>

              
            <div class="mt-2">
              <label class="text-shadow-1 text-custom text-capitalize">Valor</label>
              <input type="text" name="valor" tabindex="7" id="valor"placeholder="Valor" class="form-control bg-white">
            </div>
         

           
          </div>


   
          <!--FIN Asiento contable-->
          <!--Valor-->
          <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                <label class="text-shadow-1 text-custom text-capitalize">Tipo Concepto</label>
                <select name="tipo_concepto" tabindex="6" id="tipo_concepto" tabindex="7" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('tipo_concepto') as $tipo_concepto) { ?>
                    <option value="<?php echo $tipo_concepto->id_tipo_concepto ?>"><?php echo $tipo_concepto->tipo_concepto ?></option>
                  <?php } ?>
                </select>

          </div>
          
          <!--FIN VALOR-->
  
              <div class="col-lg-8 col-md-12 col-sm-12 col-12 mt-3 ">
                <!-- <ul id="lista_concepto" class="list-group text-dark">
                 
                </ul> -->

                <table class="table table-responsive-lg ">
                  <thead class="thead-dark">
                    <th >#</th>
                    <th >Descripcion</th>
                    <th >Asiento Contable</th>
                    <th >Tipo Concepto</th>
                    <th >Valor</th>
                  </thead>
                  <tbody id="lista_concepto">
                   
                  </tbody>
                </table>
              </div>

              <div class="col d-flex  justify-content-center align-items-center">
                <div class="">
                  <button id="guardarArray" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" type="submit">Crear Concepto</button>
                </div>
              </div>

                
            
            </div>
          

     
      
          <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d")  ?>">




          <div class="text-right my-3 ">
            <button id="GuardarNomina" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
            <button type="button" id="CancelarNomina" data-class="nomina_cancel" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Create-->

<!-- ? Modal Show-->
<div class="modal fade" id="ModalShowNomina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Show Nomina</h5>
        <button type="button"  data-class="nomina_cancel" tabindex="-1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
          <div class="row">
            

            <div class="col-md-6 mt-6 col-sm-6">
                <div class="form-group">
                  <label for="usuario" class="text-shadow-1 text-custom">Usuario</label>
                  <p  class="text-capitalize" id="show_user">User</p>
                </div>
            </div>


            <div class="col-md-6 mt-6 col-sm-6">
                <div class="form-group">
                  <label for="salario" class="text-shadow-1 text-custom">Salario</label>
                  <p  class="text-capitalize" id="show_salario">10000.000</p>
                </div>
            </div>



          </div>

          <div class="row">
      
             <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_de" class="text-shadow-1 text-custom">Fecha Desde</label>
                <p  class="text-capitalize" id="show_fecha_de">2001/22/09</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_hasta" class="text-shadow-1 text-custom">Fecha 
                    Hasta
                </label>
                <p  class="text-capitalize" id="show_fecha_hasta">2002/02/22</p>

              </div>
            </div>
          </div>

      
        <div class="row">
                  
  
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">


                <table class="table table-responsive-lg table-hover table-light ">
                  <thead class="thead-dark">
                    <th >#</th>
                    <th >Descripcion</th>
                    <th >Asiento Contable</th>
                    <th >Tipo Concepto</th>
                    <th >Valor</th>
    
                  </thead>
                  <tbody id="show_lista_concepto">
                   
                  </tbody>
                </table>
              </div>


                
            
            </div>
          

     
      
          <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d")  ?>">




          <div class="text-right my-3 ">
           
            <button type="button" id="CancelarShowNomina" data-class="nomina_cancel" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Show-->


<!-- ? Modal Update-->
<div class="modal fade" id="ModalUpdateNomina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Update Nomina</h5>
        <button type="button"  data-class="nomina_cancel" tabindex="-1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
      
         
      
        <div class="row">

        <input type="hidden" name="update_nomina" id="update_nomina">
                   <!--Descripcion-->
           <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                  <label for="update_descripcion_nomina" class="text-shadow-1 text-custom text-capitalize">Descripcion Nomina</label>
                  <textarea name="update_descripcion_nomina" id="update_descripcion_nomina" class="form_contact_textarea form-control" cols="20" rows="2" tabindex="4" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
           </div> 
          <!--FIN Descripcion-->
           <!--Asiento contable-->
           <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                <label class="text-shadow-1 text-custom text-capitalize">Asiento Contable</label>
                <select name="update_contable" tabindex="5" id="update_contable" tabindex="7" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('asiento_contable') as $asiento_contable) { ?>
                    <option value="<?php echo $asiento_contable->id_asiento_contable ?>"><?php echo $asiento_contable->asiento_contable ?></option>
                  <?php } ?>
                </select>
          </div> 


   
          <!--FIN Asiento contable-->
          <!--Valor-->
          <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <label class="text-shadow-1 text-custom text-capitalize">Tipo Concepto</label>
                <select name="update_tipo_concepto" tabindex="6" id="update_tipo_concepto" tabindex="7" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('tipo_concepto') as $tipo_concepto) { ?>
                    <option value="<?php echo $tipo_concepto->id_tipo_concepto ?>"><?php echo $tipo_concepto->tipo_concepto ?></option>
                  <?php } ?>
                </select>


          </div> 

          <div class="col-12 mt-3">
              <label class="text-shadow-1 text-custom text-capitalize">Valor</label>
              <input type="text" name="update_valor" tabindex="7" id="update_valor"placeholder="update_Valor" class="form-control bg-white">
          </div>

          <div class="col-12 mt-3 text-center">
                  <button id="guardarArrayUpdate" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" type="submit">Crear Concepto</button>
          </div>

          
          <!--FIN VALOR-->
  
              <div class=" col-12 mt-3 ">
                <!-- <ul id="lista_concepto" class="list-group text-dark">
                 
                </ul> -->

                <table class="table table-responsive-lg table-light table-hover ">
                  <thead class="thead-dark">
                    <th >#</th>
                    <th >Descripcion</th>
                    <th >Asiento Contable</th>
                    <th >Tipo Concepto</th>
                    <th >Valor</th>
                    <th >Opcion</th>
                  </thead>
                  <tbody id="update_lista_concepto">
              
                  </tbody>
                </table>
              </div>

          

                
            
            </div>
          

     
      
          <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d")  ?>">




          <div class="text-right my-3 ">
            <button id="UpdateNomina" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>
            <button type="button" id="CancelarUpdateNomina" data-class="nomina_cancel" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Update-->

    
              
    
<?php require_once 'layout/footer.php'; ?>