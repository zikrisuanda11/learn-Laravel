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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id_course');
            $table->unsignedBigInteger('id_grade');
            $table->foreign('id_grade')->references('id_grade')->on('grades')->onDelete('cascade');
            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_teacher')->references('id_teacher')->on('teachers')->onDelete('cascade');
            $table->string('name', 45);
            $table->string('description', 45)->nullable();
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
        Schema::dropIfExists('courses');
    }
};
