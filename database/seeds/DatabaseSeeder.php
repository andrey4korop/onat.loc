php artisan make:seeder UsersTableSeeder<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(subjectTableSeeder::class);
        //$this->call(norm::class);
        $this->call(Role::class);
    }
}
