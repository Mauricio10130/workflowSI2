<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'departments',
            'users',
            'roles',
            'role_user',
            'states',
            'categories'
        ]);

        // $this->call(UsersTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CategorySeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
    }
}
