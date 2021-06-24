<?php

namespace Database\Seeders;

use App\Models\Payroll;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payroll::create([
            "initial_date" => '2021-04-01',
            "final_date" => "2021-04-30",
            "user_id" => 5,
            "salary" =>  '787848',
            "status" => 2
        ]);
        Payroll::create([
            "initial_date" => '2021-04-01',
            "final_date" => "2021-04-30",
            "user_id" => 5,
            "salary" =>  '787848'
        ]);
        Payroll::create([
            "initial_date" => '2021-05-01',
            "final_date" => "2021-05-30",
            "user_id" => 5,
            "salary" =>  '787848'
        ]);
    }
}
