<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        User::create([
            "name"=> "david andrés",
            "lastname" => "hernández juajinoy",
            "email" => "david22@mail.com",
            "salary" => "1000000",
            "password" => '$2y$10$JINdIZaBYksMm3UVfdw2wu7Q0QoXBlYdxqzUergrYiQKCQq99ZVia',
            "image" => "assets/uploud/profile/default.svg",
            "document_number" => "1000323929",
            "role_id" => 1,
            "charges_id" => 1,
            "document_type_id" => 1,
            "contract_type_id" => 2,
            "token" => '$2a$07$Da22vidJuAjiNoYyZlXGhuSLjS9SNutCPEzlf5Waqwe758AMlqzQu'
        ]);
        User::create([
            "name"=> "fabian ricardo",
            "lastname" => "aldana garay",
            "email" => "fabian@mail.com",
            "salary" => "1000000",
            "password" => '$2y$10$gJwdz8k2lXxgAe0uAf2v0.GTYLtOL89UbdZQJMEVPJHuRFlO1V4BS',
            "image" => "assets/uploud/profile/default.svg",
            "document_number" => "1233905589",
            "role_id" => 1,
            "charges_id" => 1,
            "document_type_id" => 1,
            "contract_type_id" => 3,
            "token" => '$2a$07$Da22vidJuAjiNoYyZlXGhunYyXVZ1lVA7pBzaZUSmqTBlz621Aeme'
        ]);
        User::create([
            "name"=> "dashell alexander",
            "lastname" => "carrero fuentes",
            "email" => "dashel@mail.com",
            "salary" => "1000000",
            "password" => '$2y$10$fYVqLhr7EMVE01jdAZPpB.ptO.agGsPDO/LOUIuBeN3sP7Mavc.NC',
            "image" => "assets/uploud/profile/default.svg",
            "document_number" => "1018516607",
            "role_id" => 1,
            "charges_id" => 1,
            "document_type_id" => 1,
            "contract_type_id" => 3,
            "token" => '$2a$07$Da22vidJuAjiNoYyZlXGhu8sX/l5I13uTBMdSAsYrz4b88PO6B/72'
        ]);
        User::create([
            "name"=> "vanesa",
            "lastname" => "vega santa",
            "email" => "vanesa@mail.com",
            "salary" => "1000000",
            "password" => '$2y$10$1t/ND7gnTzLpxn1MWUbboOgLO4tji6rRUdwwaXsR6TuHhke8SCsY2',
            "image" => "assets/uploud/profile/default.svg",
            "document_number" => "1006093649",
            "role_id" => 1,
            "charges_id" => 1,
            "document_type_id" => 1,
            "contract_type_id" => 3,
            "token" => '$2a$07$Da22vidJuAjiNoYyZlXGhuZKRrFl7EKnNfTHoMhZjN6JcFEFWwThS'
        ]);
        User::create([
            "name"=> "andres",
            "lastname" => "hernandez juajinoy",
            "email" => "david@mail.com",
            "salary" => "1000000",
            "password" => '$2y$10$8EzP/K3s7v1.rFZnOjaAsOWfYKat0S5AG74AcuVkfAH0a6EIpeCmK',
            "image" => "assets/uploud/profile/default.svg",
            "document_number" => "1234567891",
            "role_id" => 2,
            "charges_id" => 1,
            "document_type_id" => 1,
            "contract_type_id" => 2,
            "token" => '$2a$07$Da22vidJuAjiNoYyZlXGhuzukPrxgTrWdtfNWwNTqBCOOPZ7Tf1e6'
        ]);

    }
}
