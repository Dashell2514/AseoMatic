<?php require_once 'layout/header.php'?>

<main class="main">
    <!-- * Cards -->
    <div  id="queryW" class="container mt-5 px-5 d-flex justify-content-center align-items-center ">
        <div class="row w-100">
            <div class="col-lg-12 card-div col-md-12 col-sm-12 mb-3">
                <div class="b-custom rounded card medium background d-flex justify-content-center align-items-center b-r-custom">
                    <div class="card-title mt-3">

                        <p class="h3 card-title text-white font-weight-bold text-center text-shadow " ><i>
                                <img class="img-animation" src="assets/svg/payroll1.svg" width="50px">
                            </i>Nominas</p>
                    </div>
                    <div id="queryCardW" class="w-75 card-body flex-column mt-2 d-flex justify-content-center align-items-center  ">

                        <div  class="container  b-r-custom mb-5  bg-dark ">
                            <div class="row text-white  mt-4  px-4 table-padding   ">

                                <table class="table table-bordeless b-r-custom  ">
                                    <thead class="thead-dark ">
                                        <tr class="text-white ">
                                            <th scope="col">ID</th>
                                            <th scope="col">Saldo</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light">
                                            <th scope="row">1</th>
                                            <td>$1.000.000</td>
                                            <td>28/10/2018</td>
                                            <td><i class="fas fa-eye" data-toggle="modal" data-target="#modal_comprobante"></i></td>
                                        </tr>
                                        <tr class="table-light">
                                            <th scope="row">2</th>
                                            <td>$1.000.000</td>
                                            <td>25/09/2018</td>
                                            <td><i class="fas fa-eye" data-toggle="modal" data-target="#modal_comprobante"></i></td>
                                        </tr>
                                        <tr class="table-light">
                                            <th scope="row">3</th>
                                            <td>$1.000.000</td>
                                            <td>29/08/2018</td>
                                            <td><i class="fas fa-eye" data-toggle="modal" data-target="#modal_comprobante">
                                </table>




                                <!-- MODAL -->
                                <div class="modal fade" id="modal_comprobante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header d-flex justify-content-center align-items-center flex-column ">
                                                <h5 class="modal-title text-dark " id="exampleModalLabel">Comprobante de nomina</h5>
                                            </div>
                                            <div class="modal-body">

                                                <div class="container text-dark">
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <p class="text-left  font-weight-bold text-uppercase">Servicios y suministros la equidad</p>
                                                            <p class="text-left">Direccion: Cra 12 # 43 - 12</p>
                                                            <p class="text-left">NIT: 123484114 - 12</p>
                                                        </div>

                                                        <div class="col-md-6 text-dark">
                                                            <img  src="assets/img/logo.png" alt="logo empresa" width="60%">
                                                        </div>
                                                    </div>


                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6 "> 
                                                            <p class="font-weight-bold">Nombre: <span class="font-weight-normal">CFabregas</span></p>
                                                            <p class="font-weight-bold">C.C: <span class="font-weight-normal">151234</span></p>
                                                            <p class="font-weight-bold">Entidad promotora de salud: <span class="font-weight-normal">Nueva eps</span></p>
                                                            <p class="font-weight-bold">Fondo de pensiones: <span class="font-weight-normal">proteccion</span></p>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <p class="font-weight-bold">Cargo: <span class="font-weight-normal">Futbolista que programa</span></p>
                                                            <p class="font-weight-bold">Salario Basico: <span class="font-weight-normal">10.000.000 e</span></p>
                                                            <p class="font-weight-bold">Periodo de: <span class="font-weight-normal">01/06/2020</span></p>
                                                            <p class="font-weight-bold">Periodo a:<span class="font-weight-normal">15/06/2020</span></p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row ">
                                                        <div class="col-md-12 col-lg-6">
                                                            <table class="table table-bordered table_nomina">

                                                                <tr>
                                                                    <th scope="col" colspan="3" class="text-center b-custom">INGRESOS</th>
                                                                </tr>


                                                                <tr class="">
                                                                    <th scope="col" class="text-center">
                                                                        Descripción
                                                                    </th>
                                                                    <th scope="col"class="text-center">
                                                                        UNDS
                                                                    </th>
                                                                    <th scope="col" class="text-center">
                                                                        VALOR
                                                                    </th>
                                                                </tr>


                                                                <tr>
                                                                    <td  class="text-left">
                                                                        Festivo Diurno
                                                                    </td>

                                                                    <td class="text-center">
                                                                        8.00 
                                                                    </td>

                                                                    <td class="text-right">
                                                                        31.000
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-left">
                                                                        Sueldo
                                                                    </td>

                                                                    <td class="text-center">
                                                                        15.00
                                                                    </td>

                                                                    <td class="text-right">
                                                                        5.000.000 e
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td class="text-left">
                                                                        subsidio de transporte
                                                                    </td>

                                                                    <td class="text-center">
                                                                        15.00
                                                                    </td>

                                                                    <td class="text-right">
                                                                        800.000 e
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td scope="col" colspan="2" class="text-right">Total</td>
                                                                    <td scope="col" class="text-right">5.831.00</td>
                                                                </tr>

                                                            </table>
                                                        </div>

                                                        <div class="col-md-12 col-lg-6">
                                                            <table class="table table-bordered table_nomina">

                                                                <tr>
                                                                    <th scope="col" colspan="3" class="text-center b-custom">DEDUCIONES</th>
                                                                </tr>


                                                                <tr>
                                                                    <th scope="col" class="text-center">
                                                                        DESCRIPCIÓN 
                                                                    </th>
                                                                    <th scope="col"class="text-center">
                                                                        UNDS
                                                                    </th>
                                                                    <th scope="col" class="text-center">
                                                                        VALOR
                                                                    </th>
                                                                </tr>


                                                                <tr>
                                                                    <td  class="text-left">
                                                                        Aporte de pensión empleado
                                                                    </td>

                                                                    <td class="text-center">
                                                                        0.75
                                                                    </td>

                                                                    <td class="text-right">
                                                                        4250
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-left">
                                                                        Aporte salud empleado
                                                                    </td>

                                                                    <td class="text-center">
                                                                        4.00
                                                                    </td>

                                                                    <td class="text-right">
                                                                        22.544
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td scope="col" colspan="2" class="text-right">Total</td>
                                                                    <td scope="col" class="text-right">26.794</td>
                                                                </tr>

                                                            </table>
                                                        </div>

                                                    </div>

                                                    <div class="container">
                                                        <div class="row">          
                                                            <table class="table total">
                                                                <tr class="border border-black ">
                                                                    <th class="border border-black" >Neto a pagar</th>
                                                                    <td >5.8040</td>
                                                                </tr>
                                                            </table>   
                                                        </div>    
                                                    </div>
                                                </div>




                                                <div class="modal-footer">
                                                    <button type="button" data-hover="Descargar" class="border-0 text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg" >Descargar</button>
                                                    <button type="button" data-hover="Cerrar" class="border-0 text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg" data-dismiss="modal">Cerrar</button>

                                                    <!-- <button type="button" class="btn btn-primary">Guardar Cambios</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END-MODAL-->


                            </div>



                            <div class="row text-white mb-3 ">
                                <div class="col-12 text-center d-flex justify-content-center align-items-center">
                                    <a data-hover="Algo Inusual" class=" w-75  text-decoration-none button--scale-text-1  font-weight-bold  b-custom text-white rounded-lg" data-toggle="modal" data-target="#informationModal">Algo Inusual</a>
                                </div>

                            </div>


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
<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center h4 font-weight-bold text-shadow-1 text-custom" id="informationModal">Reportar Problema </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="asunto_reporte" class=" text-custom " >Asunto</label>
                        <input type="asunto_reporte" class="form-control bg-white input-custom  "required  id="asunto_reporte">
                    </div>
                    <div class="form-group">
                        <label for="descripcion_reporte" class=" text-custom">Descripcion</label>
                        <textarea name="descripcion_reporte" required id="descripcion_reporte" cols="20" class="form-control bg-white input-custom"  rows="3"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="numero_reporte" class=" text-custom">Numero de Nomina</label>
                        <input type="number" class="form-control bg-white input-custom"  required id="numero_reporte">
                    </div>

                    <div class="d-flex justify-content-start align-items-center">
                        <button  type="button" class="mr-3 btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg">Enviar</button>

                        <button type="button" class=" btn-custom b-r-custom text-decoration-none  font-weight-bold  b-custom text-white rounded-lg" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- ? End Modal -->

<?php require_once 'layout/footer.php'?>