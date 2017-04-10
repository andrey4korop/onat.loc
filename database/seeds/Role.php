<?php

use Illuminate\Database\Seeder;
use App\Role as Roles;
class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role->create(['permission'=>'Student']);
        $role->create(['permission'=>'Shtat']);
        $role->create(['permission'=>'Spravka']);
    }
}
