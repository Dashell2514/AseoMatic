<?php
class PdfController {

    private $seguridad;
    public function __construct(){
        try
        {
            $this->seguridad = new Security();
            $this->seguridad->seguridadAmbos();
        }catch(Exception $e)
        {
            die('Error de Instancia');
        }
    }

    public function downloadpdf(){
        $id_nomina =$_REQUEST['id_nomina'];

        if($id_nomina)
        {
            require_once 'vendor/autoload.php';

            $conceptos=Nomina::consultarConceptosPorNomina($id_nomina);
            $nomina=Nomina::consultarUnaNomina($id_nomina);
            
            $html =' <div class="container text-dark">
            <div class="grid">          
                <table class=" mt-3 total w-100 ">
                    <tr class="text-left">
                        <th class=""><p class="font-weight-bold text-uppercase">Servicios y suministros la equidad</p>
                        <p class="">Direccion: Cra. 113b ##152b-37</p></th>
                        <th class=" font-weight-normal "><img  src="assets/svg/logo.svg" alt="logo empresa" width="30%"></th>
                    </tr>
                </table>   
            </div>    
    
            <div class="grid">
            
                    <p class="font-weight-bold">Nombre: <span class="font-weight-normal text-capitalize">'.$nomina->nombres.' '.$nomina->apellidos.'</span></p>
                    <p class="font-weight-bold">C.C: <span class="font-weight-normal">'.$nomina->numero_documento.'</span></p>
    
    
                    <p class="font-weight-bold">Cargo: <span class="font-weight-normal">'.$nomina->nombre_cargo.'</span></p>
                    <p class="font-weight-bold">Periodo de: <span class="font-weight-normal"> '. $nomina->fecha_de.'</span></p>
                    <p class="font-weight-bold">Periodo a:<span class="font-weight-normal"> '. $nomina->fecha_hasta.'</span></p>
            
            </div>
    
            <div class="grid ">
                <div class="w-100">
                    <table class="table table-bordered table_nomina">
    
                        <tr>
                            <th scope="col" colspan="3" class="text-center b-custom">INGRESOS</th>
                        </tr>
    
    
                        <tr class="">
                            <th scope="col" class="text-center">
                                Descripción
                            </th>
                            <th scope="col"class="text-center">
                                Tipo Concepto
                            </th>
                            <th scope="col" class="text-center">
                                Pagos
                            </th>
                        </tr>';
                    
                        foreach ($conceptos as $concepto) {
                            $html.='<tr>
                            <td  class="text-left ">
                                '.$concepto->descripcion.'
                            </td>
    
                            <td class="text-center text-capitalize">
                                '.$concepto->tipo_concepto.'
                            </td>
    
                            <td class="text-right">
                            '.$concepto->valor.'
                            </td>
                        </tr>';       
                            
                        }
    
    
                        $html.='<tr>
                            <td scope="col" colspan="2" class="text-right">Total</td>
                            <td scope="col" class="text-right">'.$nomina->valor.'</td>
                        </tr>
    
                    </table>
                </div>
    
            
            </div>
            
        </div>';
            $mpdf = new \Mpdf\Mpdf();
    
            $stylesheetpdf =file_get_contents('assets/css/pdf.css');
            $mpdf->WriteHTML($stylesheetpdf,1);
            $mpdf->WriteHTML($html);
            $mpdf->Output('nomina'.$nomina->numero_documento.'.pdf',"I");
        }
    }

}