<?php

use Illuminate\Database\Seeder;
use App\Group as Groups;
class Group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Groups();
        $group->create(['group_name'=>'ЕП-21']);
        $group->create(['group_name'=>'ЕП-22']);

    }
}
