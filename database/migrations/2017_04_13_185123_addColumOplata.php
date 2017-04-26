<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumOplata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oplata', function ($table) {
            $table->string('status_oplatu')->nullable();
            $table->integer('status_from_student')->nullable();
            $table->integer('status_from_dekanat')->nullable();

            $table->text('commentary_from_dekanat')->nullable();
            $table->renameColumn('commentary', 'commentary_from_student');
            $table->string('dopusk_to_sesion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oplata', function ($table) {

            $table->dropColumn('status_oplatu');
            $table->dropColumn('status_from_student');
            $table->dropColumn('status_from_dekanat');
            $table->dropColumn('status_from_dekanat');
            $table->dropColumn('commentary_from_dekanat');
            $table->renameColumn('commentary_from_student', 'commentary');
            $table->dropColumn('status_oplatu');
        });
    }
}
