<?php require_once 'layout/header.php'; ?>


<main class="main w-100">
 
  <div class="container mt-5">
    <div class="row w-100 mx-0">

      <div class="col-12 ">
        <table class="table  w-100  table-responsive-lg">
        
            <input type="text" id="buscador" class="form-control text-white bg-dark " placeholder="Buscador de Nombres y documento">
          <thead class="thead-dark">
            <tr>
              <th colspan="1">#</th>
              <th colspan="2">Nombres</th>
              <th colspan="2">Apellidos</th>
              <th>Documento</th>
              <th>Correo</th>
              <th>Rol</th>
              <th>Opciones</th>
              <th class="th-opacity b-custom"><i class="fa fa-plus" data-toggle="modal" data-target="#ModalAddUser"></i></th>
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
<div class="modal fade" id="ModalAddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
              text-white" id="informationModal">Agregar Usuario</h5>
        <button type="button" id="cerrarModalUsuario" tabindex="-1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card bg-dark border-0 text-white "  >
                  <img  id="prev_user_img" class="card-img rounded-circle size-img_user_form"   alt="">

                  <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                          <label data-hover="Seleccionar Img" for="user_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                          <input type="file" name="user_img" id="user_img" class="img-profile__input-file">
                  </div>
                </div>
            
            </div>

            <div class="col-md-6 mt-4 col-sm-12">
                <div class="form-group">
                  <label for="nombres"  class="text-shadow-1 text-custom">Nombres</label>
                  <input type="text" tabindex="1" class="form-control bg-white input-custom" name="nombres" placeholder="pepito" id="nombres">
                </div>    
                <div class="form-group">
                  <label for="apellidos" class="text-shadow-1 text-custom">Apellidos</label>
                  <input type="text" tabindex="2" class="form-control bg-white input-custom" name="apellidos" placeholder="perez" id="apellidos">
                </div>
            </div>



          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                  <label for="correo" class="text-shadow-1 text-custom">Correo</label>
                  <input type="email" tabindex="3" class="form-control bg-white input-custom" name="correo" placeholder="pepito@gmail.com" id="correo">
                </div>

              <div class="form-group">
                <label for="password" class="text-shadow-1 text-custom">Clave</label>
                <input type="password" tabindex="4" class="form-control bg-white input-custom" name="clave" placeholder="12345" id="clave">
              </div>
            </div>
          </div>

          <div class="row">
      
            <div class="col-md-8 col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="numero_documento" class="text-shadow-1 text-custom">Número
                  Documento</label>
                <input type="text" tabindex="5" class="form-control bg-white input-custom" placeholder="1234567890" name="numero_documento" id="numero_documento">
              </div>
            </div>

            <div class="col-md-8 col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="salario" class="text-shadow-1 text-custom">Salario</label>
                <input type="text" tabindex="6" class="form-control bg-white input-custom" placeholder="10000000" name="salario" id="salario">
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-12">
              <div class="form-group">
                <label for="tipo_documento" class="text-shadow-1 text-custom">Tipo
                  Documento</label>
                <select name="tipo_documento" tabindex="7" id="tipo_documento" class="form-control bg-white">
                  <option value=""   selected="true">-- Seleccione --</option>
                  <?php foreach (Administrador::allTable('document_types') as $documento) { ?>
                    <option value="<?php echo $documento->id ?>"><?php echo $documento->name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="form-group col-md-6 col-lg-4 col-sm-12">
              <label for="cargo" class="text-shadow-1 text-custom">Cargo</label>
              <select name="cargo" id="cargo" tabindex="8"class="form-control bg-white">
                <option value=""  selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('charges') as $cargo) { ?>
                  <option value="<?php echo $cargo->id ?>"><?php echo $cargo->name ?></option>
                <?php } ?>
              </select>
            </div>

         

     

            <div class="form-group col-md-6 col-lg-4 col-sm-12">
              <label for="rol" class="text-shadow-1 text-custom">Rol</label>
              <select name="rol" id="rol" tabindex="9" class="form-control bg-white">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('roles') as $rol) { ?>
                  <option value="<?php echo $rol->id ?>"><?php echo $rol->name ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-12 col-lg-4 col-sm-12">
              <label for="tipo_contrato" class="text-shadow-1 text-custom">Tipo Contrato</label>
              <select name="tipo_contrato" id="tipo_contrato" tabindex="10" class="form-control bg-white">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('contract_types') as $tipo_contrato) { ?>
                  <option value="<?php echo $tipo_contrato->id ?>"><?php echo $tipo_contrato->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

     

          <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d")  ?>">

         
<!-- 
  //? Nomina
  -->

          <h3 class="text-shadow-1 text-custom" >Conceptos</h3>
          <div class="row">
      
             <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_de" class="text-shadow-1 text-custom">Fecha De Ingreso</label>
                <input type="date"tabindex="11" name="fecha_de" id="fecha_de" class="form-control">
              </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="fecha_hasta" class="text-shadow-1 text-custom">Fecha 
                    Hasta
                </label>
                <input type="date" tabindex="12" name="fecha_hasta" id="fecha_hasta" class="form-control">

              </div>
            </div>
          </div>


      
        <div class="row">
                   <!--Descripcion-->
          <div class="col-6">
                  <label for="descripcion_nomina" class="text-shadow-1 text-custom text-capitalize">Descripción Concepto</label>
                  <textarea name="descripcion_nomina" id="descripcion_nomina" class="form_contact_textarea form-control" cols="20" rows="2" tabindex="13" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
           </div>
          <!--FIN Descripcion-->
           <!--Asiento contable-->
          <div class="col-6">
                <label class="text-shadow-1 text-custom text-capitalize">Asiento Contable</label>
                <select name="contable" id="contable" tabindex="14" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('accounting_entry') as $asiento_contable) { ?>
                    <option value="<?php echo $asiento_contable->id ?>"><?php echo $asiento_contable->name ?></option>
                  <?php } ?>
                </select>         
          </div>


       


   
          <!--FIN Asiento contable-->
          <!--Valor-->
          <div class="col-6 mt-3">
                <label class="text-shadow-1 text-custom text-capitalize">Tipo Concepto</label>
                <select name="tipo_concepto" id="tipo_concepto" tabindex="15" class="form-control bg-white">
                  <option value="" selected="true">---Seleccione---</option>
                  <?php foreach (Administrador::allTable('types_concepts') as $tipo_concepto) { ?>
                    <option value="<?php echo $tipo_concepto->id ?>"><?php echo $tipo_concepto->name ?></option>
                  <?php } ?>
                </select>

          </div>
          
          <div class="col-6 mt-3">
              <label class="text-shadow-1 text-custom text-capitalize">Valor</label>
              <input type="text" name="valor" tabindex="16" id="valor"placeholder="Valor" class="form-control bg-white">
            </div>
          <!--FIN VALOR-->
  
              <div class="col-lg-8 col-md-12 col-sm-12 col-12 mt-5 ">
              
                  <table class="table w-100 table-responsive-lg  ">
                    <thead class="thead-dark">
                      <th >#</th>
                      <th >Descripcion</th>
                      <th >Asiento Contable</th>
                      <th >Tipo Concepto</th>
                      <th >Valor</th>
                      <th >Opcion</th>
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


<!-- //? End Nomina -->

        


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

<!-- ? Modal Update-->
<div class="modal fade w-100" id="ModalUpdateUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="informationModal">Actualizar Usuario</h5>
        <button type="button" id="cerrarModalUpdateUsuario" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">
          <div class="row">
            <div class="col-md-6  col-sm-12">
       
                <input type="hidden" name="update_id" id="update_id">
                <input type="hidden" name="token" id="token">
                <input type="hidden" name="clave_antigua" id="clave_antigua">

                <div class="card bg-dark border-0 text-white "  >
                  <img  id="update_prev_user_img" class="card-img rounded-circle size-img_user_form"   alt="">

                  <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                          <label data-hover="Seleccionar Img" for="update_user_img" class="w-100 text-center text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg text-capitalize">Seleccionar Imagen</label>
                          <input type="file" name="update_user_img" id="update_user_img" class="img-profile__input-file">
                  </div>
                </div>
            </div>



            <div class="col-md-6 mt-4 col-sm-12">

                <div class="form-group">
                  <label for="update_nombres" class="text-shadow-1 text-custom">Nombres</label>
                  <input tabindex="1" type="text" class="form-control bg-white text-capitalize input-custom" name="update_nombres" id="update_nombres">
                </div>

                <div class="form-group">
                  <label for="update_apellidos" class="text-shadow-1 text-custom">Apellidos</label>
                  <input tabindex="2" type="text" class="form-control bg-white text-capitalize input-custom" name="update_apellidos" id="update_apellidos">
                </div>

            </div>

            <div class="form-group col-12">

                <label for="update_correo" class="text-shadow-1 text-custom">Correo</label>
                <input tabindex="3" type="email" class="form-control bg-white input-custom" name="update_correo" id="update_correo">

                <label for="update_clave" class="text-shadow-1 text-custom">Clave</label>
                <input tabindex="4" type="password" class="form-control bg-white input-custom" name="update_clave" id="update_clave" placeholder="Escriba si quiere modificar la contraseña si no deje en blanco">

            </div>

            <div class="form-group col-md-4 col-sm-12">

              <label for="update_numero_documento" class="text-shadow-1 text-custom">Número Documento</label>
              <input tabindex="5" type="text" class="form-control bg-white input-custom" name="update_numero_documento" id="update_numero_documento">

            </div>

            <div class="form-group col-md-4 col-sm-12">

              <label for="update_salario" class="text-shadow-1 text-custom">Salario</label>
              <input tabindex="6" type="text" class="form-control bg-white input-custom" name="update_salario" id="update_salario">

            </div>

            <div class="form-group col-md-4 col-sm-12">

              <label for="update_tipo_documento" class="text-shadow-1 text-custom">Tipo Documento</label>
              <select tabindex="7" name="update_tipo_documento" id="update_tipo_documento" class="form-control bg-white text-capitalize">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('document_types') as $documento) { ?>
                  <option value="<?php echo $documento->id ?>"><?php echo $documento->name ?></option>
                <?php } ?>
              </select>

            </div>

          </div>

          <div class="row">



            <div class="form-group  col-sm-12 col-lg-4 col-md-6">

              <label for="update_rol" class="text-shadow-1 text-custom">Rol</label>
              <select tabindex="8" name="update_rol" id="update_rol" class="form-control bg-white text-capitalize">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('roles') as $rol) { ?>
                  <option value="<?php echo $rol->id ?>"><?php echo $rol->name ?></option>
                <?php } ?>
              </select>

            </div>


            <div class="form-group  col-sm-12 col-lg-4 col-md-6">

              <label for="update_cargo" class="text-shadow-1 text-custom">Cargo</label>
              <select  tabindex="9" name="update_cargo" id="update_cargo" class="form-control bg-white text-capitalize">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('charges') as $cargo) { ?>
                  <option value="<?php echo $cargo->id ?>"><?php echo $cargo->name ?></option>
                <?php } ?>
              </select>

            </div>

            <div class="form-group  col-sm-12 col-lg-4 col-md-12">

              <label for="update_tipo_contrato" class="text-shadow-1 text-custom">Tipo Contrato</label>
              <select tabindex="10" name="update_tipo_contrato" id="update_tipo_contrato" class="form-control bg-white text-capitalize">
                <option value="" selected="true">-- Seleccione --</option>
                <?php foreach (Administrador::allTable('contract_types') as $tipo_contrato) { ?>
                  <option value="<?php echo $tipo_contrato->id ?>"><?php echo $tipo_contrato->name ?></option>
                <?php } ?>
              </select>

            </div>

     

          </div>


          <!-- NOMINA -->
      
         
      
      <div class="row">

      <input type="hidden" name="update_nomina" id="update_nomina">
                 <!--Descripcion-->
         <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                <label for="update_descripcion_nomina" class="text-shadow-1 text-custom text-capitalize">Descripción Nomina</label>
                <textarea name="update_descripcion_nomina" id="update_descripcion_nomina" class="form_contact_textarea form-control" cols="20" rows="2" tabindex="11" placeholder="Juanito salio a pescar y salio Pescado xd"></textarea>
         </div> 
        <!--FIN Descripcion-->
         <!--Asiento contable-->
         <div class="col-md-6 col-lg-4 col-sm-6 col-6">
              <label class="text-shadow-1 text-custom text-capitalize">Asiento Contable</label>
              <select name="update_contable" id="update_contable" tabindex="12" class="form-control bg-white">
                <option value="" selected="true">---Seleccione---</option>
                <?php foreach (Administrador::allTable('accounting_entry') as $asiento_contable) { ?>
                  <option value="<?php echo $asiento_contable->id ?>"><?php echo $asiento_contable->name ?></option>
                <?php } ?>
              </select>
        </div> 


 
        <!--FIN Asiento contable-->
        <!--Valor-->
        <div class="col-md-12 col-lg-4 col-sm-12 col-12">
              <label class="text-shadow-1 text-custom text-capitalize">Tipo Concepto</label>
              <select name="update_tipo_concepto" id="update_tipo_concepto" tabindex="13" class="form-control bg-white">
                <option value="" selected="true">---Seleccione---</option>
                <?php foreach (Administrador::allTable('types_concepts') as $tipo_concepto) { ?>
                  <option value="<?php echo $tipo_concepto->id ?>"><?php echo $tipo_concepto->name ?></option>
                <?php } ?>
              </select>


        </div> 

        <div class="col-12 mt-3">
            <label class="text-shadow-1 text-custom text-capitalize">Valor</label>
            <input type="text" name="update_valor" tabindex="14" id="update_valor"placeholder="update_Valor" class="form-control bg-white">
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


   <!-- ? NOMINA -->

    
  

          <input type="hidden" name="updated_at" id="updated_at" value="<?php echo date("Y-m-d")  ?>">

          <div class="d-flex justify-content-end align-items-center my-2 ">

            <button id="EditarUsuario" class="mr-3 btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg">Aceptar</button>


            <button type="button" id="CancelarUpdateUsuario" class="btn-custom b-r-custom text-decoration-none font-weight-bold b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
          </div>

       
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ? Modal End Update-->


<!-- ? Modal Show-->
<div class="modal fade w-100" id="ModalShowUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
  
    <div class="modal-content  bg-dark text-white">
      <div class="modal-header border-0 b-custom">
        <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1
        text-white" id="showModal">Informacion del Usuario</h5>
        <button type="button" id="cerrarModalShowUsuario" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row d-flex justify-content-between align-items-center px-5">
           
              <div class="col-md-6  col-6">
                <div class="form-group">
                  <label for="update_nombres" class="text-shadow-1 text-custom">Nombres</label>
                  <p id="show_nombres" class="d-block text-capitalize"></p>    
                </div>

                <div class="form-group ">
                    <label  class="text-shadow-1 text-custom">Cargo</label>
                    <select id="show_cargo" class="bg-white d-block text-capitalize" disabled>
                      <?php foreach (Administrador::allTable('charges') as $cargo) { ?>
                        <option value="<?php echo $cargo->id ?>"><?php echo $cargo->name ?></option>
                      <?php } ?>
                    </select>
                </div>


                <div class="form-group ">
                    <label class="text-shadow-1 text-custom">Número Documento</label>
                    <p id="show_numero_documento" class="d-block"></p>
                </div>
              </div>
            

              <div class="col-md-6 col-6">

                <div class="d-flex justify-content-center align-items-center ">
                      <img src="" alt="" class="rounded-circle border-0 img-avatar-male" id="show_user_img">
              </div>

              </div>

              <div class="form-group col-12">
                <label class="text-shadow-1 text-custom">Correo</label>
                <p id="show_correo" class="d-block"></p>
              </div>

          

           

              <div class="form-group col-md-6 col-sm-6 col-12">
                <label class="text-shadow-1 text-custom">Tipo Documento</label>
                <select id="show_tipo_documento" class="bg-white d-block" text-capitalize  disabled>
                  <?php foreach (Administrador::allTable('document_types') as $documento) { ?>
                    <option class="bg-white" value="<?php echo $documento->id ?>"><?php echo $documento->name ?></option>
                  <?php } ?>
                </select>
              </div>

           

                  
          
    

              <div class="form-group  col-6 col-sm-6 ">
                <label  class="text-shadow-1 text-custom">Rol</label>
                <select id="show_rol"  class="bg-white d-block"  disabled>
                  <?php foreach (Administrador::allTable('roles') as $rol) { ?>
                    <option value="<?php echo $rol->id ?>"><?php echo $rol->name ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group col-12  col-md-6 mt-3 ">
                <label class="text-shadow-1 text-custom">Salario</label>
                <p id="show_salario" class="d-block"></p>
              </div>

              <div class="form-group col-12  col-md-6 ">
                <label  class="text-shadow-1 text-custom">Tipo Contrato</label>
                <select id="show_tipo_contrato" class="d-block bg-white text-capitalize" disabled>
                  <?php foreach (Administrador::allTable('contract_types') as $tipo_contrato) { ?>
                    <option value="<?php echo $tipo_contrato->id ?>"><?php echo $tipo_contrato->name ?></option>
                  <?php } ?>
                </select>
              </div>

<!-- Nomina -->


       


      
          <div class="row table-responsive mx-0 ">
                  
  
              <div class="col-12 mt-3 ">


                <table class="table table-responsive-lg table-light table-hover">
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


<!-- END Nomina -->




              <div class="d-flex justify-content-end align-items-center col-12 ">



                  <button type="button" id="CancelarShowUsuario" class="btn-custom b-r-custom
                      text-decoration-none font-weight-bold b-custom text-white
                      rounded-lg" data-dismiss="modal">Cerrar</button>
              </div>

          </div>




        
 
      </div>
    </div>
  </div>
</div>
    <!-- ? Modal End Show-->
    
              
    
<?php require_once 'layout/footer.php'; ?>
