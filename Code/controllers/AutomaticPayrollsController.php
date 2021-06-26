<?php

class AutomaticPayrollsController
{

    private $nomina;

    public function __construct()
    {
        try
        {
            $this->nomina = new Nomina();
        }catch(Exception $e)
        {
            die('Error de Instancia');
        }

    }

    public function daysEndMonth($method = "DaysMonth")
    {
        $total_mes = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        if ($method == "remainingDays") {
            $transcurrido = date("d");
            return $total_mes - $transcurrido;
        } else {
            return $total_mes;
        }
    }

    public function validacionNominaPorFechas($id, $inital_date, $final_date)
    {

        // 
        $verificar = $this->nomina->ValidarSiExisteNomina($id, $inital_date, $final_date);

        if ($verificar) {
            return true;
        } else {
            return false;
        }
    }

    public function automaticPayroll()
    {
        $remainingDays = $this->daysEndMonth("remainingDays");
        // echo json_encode(['hoy'=> $remainingDays]);
        // return;
        $day = $_REQUEST['day'];
        if ($remainingDays == $day) {
            $daysMonth = $this->daysEndMonth(); //dias del mes
            // $dateFrom = date("Y-m-d" ,mktime(0, 0, 0, date("m")  , date("d")-($daysMonth-1), date("Y")));
            $dateFrom = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 16, date("Y")));
            // $dateFrom = date("Y-m-d" ,mktime(0, 0, 0, 6  , 30-(29), 2021)); EJEMPLO DE LO QUE HACE 
            $dateTo = date("Y-m-d");
            $usersId = Usuario::usersId(); //id usuarios

            if ($usersId) {
                for ($i = 0; $i < count($usersId); $i++) {

                    if ($this->validacionNominaPorFechas($usersId[$i]->id, $dateFrom, $dateTo)) {
                        continue; //se salta el ciclo si ya tiene nomina en esa fecha creada
                    }
                    $this->nomina->createNomina($usersId[$i]->id, $dateFrom, $dateTo); //se crea las nominas 
                    $userConcepts = $this->nomina->conceptosFijos($usersId[$i]->id); //se obtienen los conceptos fijos
                    $lastPayroll =$this->nomina->consultarUltimaNomina(); //fk_nomina

                    $total = 0;
                    for ($j = 0; $j < count($userConcepts); $j++) {
                        $data = $userConcepts[$j];

                        $this->nomina->createConcept($data->descripcion, 1, $data->fk_asiento_contable, $data->valor, $data->fk_tipo_concepto, $lastPayroll->id_nomina);

                        if ($data->fk_asiento_contable == 2) {
                            $total -= $data->valor;
                        } else {
                            $total += $data->valor;
                        }
                    }
                    $this->nomina->updateNominaValor($total, $lastPayroll->id_nomina); //salary 
                }
                return;
            }
        } else {
            echo json_encode(['faltan' => $remainingDays]);
            return;
        }
    }
}
