<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function ($table) {
            $table->string('name', 255)->default('');
            $table->string('surname', 255)->default('');
            $table->renameColumn('FIO', 'firstName');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function ($table) {
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->renameColumn('firstName', 'FIO');

        });
    }
}
