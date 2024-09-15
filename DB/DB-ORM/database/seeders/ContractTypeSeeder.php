<?php

namespace Database\Seeders;

use App\Models\ContractType;
use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContractType::create([
            "name"=> "Contrato Indefinido"
        ]); 
        ContractType::create([
            "name"=> "Contrato Temporal"
        ]); 
        ContractType::create([
            "name"=> "Contrato Para La Formación Y El Aprendizaje"
        ]);
        ContractType::create([
            "name"=> "Contrato En Prácticas"
        ]);
    }
}
