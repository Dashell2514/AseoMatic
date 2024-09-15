<?php

namespace Database\Seeders;

use App\Models\Concepts;
use Illuminate\Database\Seeder;

class ConceptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concepts::create([
            "description" => 'Cuota de sostenimiento',
            "status" => 2,
            "value" => '681394',
            "concepts_id" =>  3,
            "payroll_id" => 1,
            "accounting_entry_id" => 1,
        ]);
        Concepts::create([
            "description" => 'Auxilio de transporte',
            "status" => 2,
            "value" => '106454',
            "concepts_id" =>  4,
            "payroll_id" => 1,
            "accounting_entry_id" => 1
        ]);

        Concepts::create([
            "description" => 'Cuota de sostenimiento',
            "status" => 1,
            "value" => '681394',
            "concepts_id" =>  3,
            "payroll_id" => 2,
            "accounting_entry_id" => 1
        ]);
        Concepts::create([
            "description" => 'Auxilio de transporte',
            "status" => 1,
            "value" => '106454',
            "concepts_id" =>  4,
            "payroll_id" => 2,
            "accounting_entry_id" => 1
        ]);


        Concepts::create([
            "description" => 'Cuota de sostenimiento',
            "status" => 1,
            "value" => '681394',
            "concepts_id" =>  3,
            "payroll_id" => 3,
            "accounting_entry_id" => 1
        ]);
        Concepts::create([
            "description" => 'Auxilio de transporte',
            "status" => 1,
            "value" => '106454',
            "concepts_id" =>  4,
            "payroll_id" => 3,
            "accounting_entry_id" => 1
        ]);
    }
}
