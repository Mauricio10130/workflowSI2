<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedureUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('procedure_user')->insert([
            'procedure_id' => 1,
            'user_id' => 4
        ]);

        DB::table('procedure_user')->insert([
            'procedure_id' => 1,
            'user_id' => 3
        ]);
    }
}
