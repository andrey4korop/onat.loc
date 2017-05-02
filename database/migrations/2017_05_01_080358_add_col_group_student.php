<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColGroupStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_student', function ($table) {
            $table->integer('type_poselenia')->nullable();
            $table->string('oplata', 20)->default('-');
            $table->string('comentary', 255)->default('');
            $table->string('zayava', 255)->default('');
            $table->string('nakaz', 255)->default('');
            $table->string('hz', 255)->default('');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
