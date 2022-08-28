<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id_classroom');
            $table->year('year');
            $table->unsignedBigInteger('id_grade');
            $table->foreign('id_grade')->references('id_grade')->on('grades');
            $table->boolean('status');
            $table->string('remarks', 45);
            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_teacher')->references('id_teacher')->on('teachers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
};
