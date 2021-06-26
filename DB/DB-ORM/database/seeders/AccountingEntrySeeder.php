<?php

namespace Database\Seeders;

use App\Models\AccountingEntry;
use Illuminate\Database\Seeder;

class AccountingEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountingEntry::create([
            "name"=> "Devengado"
        ]);
    
        AccountingEntry::create([
            "name"=> "Deducido"
        ]);
    }
}
