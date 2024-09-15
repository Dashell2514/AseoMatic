<?php

namespace Database\Seeders;

use App\Models\TypeConcept;
use Illuminate\Database\Seeder;

class TypeConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeConcept::create([
            "name"=> "Aportes Salud Empleado"
        ]);
        TypeConcept::create([
            "name"=> "Aportes Pension Empleado"
        ]);
        TypeConcept::create([
            "name"=> "Salario Ordinario"
        ]);
        TypeConcept::create([
            "name"=> "Subsidio Transporte"
        ]);
        TypeConcept::create([
            "name"=> "Otro"
        ]);
    }
}
