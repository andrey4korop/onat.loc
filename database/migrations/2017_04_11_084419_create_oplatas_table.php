<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOplatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oplata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->float('summa_need_oplatu');
            $table->float('oplacheno');
            $table->integer('status_id');
            $table->text('commentary');
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
        Schema::dropIfExists('oplata');
    }
}
