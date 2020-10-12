<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Verificación de Trámite',
            'description' => 'Se verifica los buros crediticios.'
        ]);

        DB::table('states')->insert([
            'name' => 'Trámite Aceptado',
            'description' => 'Verificación de los requisitos.'
        ]);

        DB::table('states')->insert([
            'name' => 'Pendiente',
            'description' => 'Revisión a detalle de los requisitos.'
        ]);

        DB::table('states')->insert([
            'name' => 'Revisión',
            'description' => 'Se verifica si cumple con todo lo establecido.'
        ]);

        DB::table('states')->insert([
            'name' => 'Observado',
            'description' => 'Será observado por algunas irregularidades que existan.'
        ]);

        DB::table('states')->insert([
            'name' => 'Completado',
            'description' => 'El trámite ha sido completado satisfactoriamente.'
        ]);
    }
}
