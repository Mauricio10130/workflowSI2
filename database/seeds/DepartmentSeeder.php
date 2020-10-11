<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Acesor de Negocio',
            'description' => 'Es un profesional que brinda el servicio de asesoramiento a emprendedores'
        ]);

        DB::table('departments')->insert([
            'name' => 'Asistente de Crédito',
            'description' => 'Evalúa la solvencia de las personas que aplican a la obtención de un préstamo bancario.'
        ]);

        DB::table('departments')->insert([
            'name' => 'Oficial de Plataforma',
            'description' => 'Encargado de las operaciones de la sucursal, asegurando el correcto funcionamiento de las operaciones de servicio al cliente. '
        ]);

        DB::table('departments')->insert([
            'name' => 'Gerente de Agencia',
            'description' => 'Es el responsable de administrar el recurso humano y financiero de la sucursal bancaria.'
        ]);

        DB::table('departments')->insert([
            'name' => 'Administrador de Cartera',
            'description' => 'Se ocupa de principio a fin de los procesos de Administración de Cartera y Colocaciones, logrando una completa y flexible administración de productos de crédito. '
        ]);
    }
}
