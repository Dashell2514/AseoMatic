<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create([
            "name"=> "Cédula De Ciudadania"
        ]);
        DocumentType::create([
            "name"=> "Tarjeta De Identidad"
        ]);
        DocumentType::create([
            "name"=> "Cédula De Extranjeria"
        ]);
    }
}
