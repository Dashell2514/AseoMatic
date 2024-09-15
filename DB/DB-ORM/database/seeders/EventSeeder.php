<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Event::create([
                "title"=> "servicio aseo party",
                "description" => "<p>Limpiamos... Si después de un evento, fiesta o celebración está desordenado y sucio, llámenos, limpiamos y ordenamos por usted. Somos una empresa dedicada a dar una solución con el objetivo que nuestros clientes puedan disfrutar al máximo su momento de esparcimiento sin la preocupación de tener que limpiar después. </p><p>Ofrecemos: Aspirado Profundo de Suciedad en Superficies Lavado y Sellado de toda clase de Pisos Limpieza y Desinfección en Baños y Cocina Aspirado y desmanchado de Alfombras Recolección de Basura Sanitizado con Luces UV Limpieza de Vidrios Bajos y en Altura Entregando Aseo Integral de Calidad</p>",
                "image" => "assets/uploud/events/1601832644evento1.jpg",
                "user_id" => 1
            ]);
            Event::create([
                "title"=> "capacitación en técnicas de supervisión de aseo",
                "description" => "<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>",
                "image" => "assets/uploud/events/1601833437noticia0.jpg",
                "user_id" => 1
            ]);
            Event::create([
                "title"=> "capacitación en técnicas de supervisión de aseo 1",
                "description" => "<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>",
                "image" => "assets/uploud/events/1601833437noticia0.jpg",
                "user_id" => 1
            ]);
            Event::create([
                "title"=> "capacitación en técnicas de supervisión de aseo 2",
                "description" => "<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>",
                "image" => "assets/uploud/events/1601833437noticia0.jpg",
                "user_id" => 1
            ]);
            Event::create([
                "title"=> "capacitación en técnicas de supervisión de aseo 3",
                "description" => "<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>",
                "image" => "assets/uploud/events/1601833437noticia0.jpg",
                "user_id" => 1
            ]);
    }
}
