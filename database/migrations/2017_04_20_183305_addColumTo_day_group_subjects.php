<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToDayGroupSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_group_subjects', function ($table) {
            $table->string('prepod1', 20)->default('');
            $table->string('prepod2', 20)->default('');
            $table->string('prepod3', 20)->default('');
            $table->string('prepod4', 20)->default('');

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
