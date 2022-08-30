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
        Schema::create('classroom_students', function (Blueprint $table) {
            $table->bigIncrements('id_classroom_student');
            $table->foreignId('id_classroom');
            $table->foreignId('id_student');
            
            $table->foreign('id_classroom')->references('id_classroom')->on('classrooms')->onDelete('cascade');
            $table->foreign('id_student')->references('id_student')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('classroom_students');
    }
};
