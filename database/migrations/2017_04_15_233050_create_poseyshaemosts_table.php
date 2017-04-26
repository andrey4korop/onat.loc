<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoseyshaemostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poseyshaemosts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('data');
            $table->integer('status1');
            $table->integer('status2');
            $table->integer('status3');
            $table->integer('status4');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poseyshaemosts');
    }
}
