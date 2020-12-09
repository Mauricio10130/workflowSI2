<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('procedures')->insert([
            'state_id' => '1',
            'category_id' => '1',
            'description' => 'Solicitud de Préstamo.'
        ]);
    }
}
