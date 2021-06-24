<?php

namespace Database\Seeders;

use App\Models\accountingSeat;
use App\Models\documentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(ChargeSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(AccountingEntrySeeder::class);
        $this->call(ContractTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeConceptSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PayrollSeeder::class);
        $this->call(ConceptsSeeder::class);
    }
}
