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
        Schema::create('exam_results', function (Blueprint $table) {
            // $table->foreignId('id_exam')->constrained('exams')->onDelete('cascade');
            // $table->foreignId('id_student')->constrained('students')->onDelete('cascade');
            // $table->foreignId('id_course')->constrained('courses')->onDelete('cascade');
            $table->unsignedBigInteger('id_exam');
            $table->foreign('id_exam')->references('id_exam')->on('exams')->onDelete('cascade');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id_student')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('id_course');
            $table->foreign('id_course')->references('id_course')->on('courses')->onDelete('cascade');
            $table->string('marks', 45)->nullable();
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
        Schema::dropIfExists('exam_results');
    }
};
