<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        DB::table('users')->insert([
            'name' => 'Alex',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('adminadmin'),
            'department_id' => 1
        ]);

// ----------------Generando Registros Aleatorios------------------------
//        $faker = Faker::create();
//        foreach (range(1, 100) as $index) {
//            DB::table('users')->insert([
//                'name'=>$faker->name,
//                'email' => $faker->email,
//                'password' =>('password'),
//                'created_at'=>  $faker->dateTime,
//                'updated_at'=>  $faker->dateTime
//            ]);
//        }
    }
}
