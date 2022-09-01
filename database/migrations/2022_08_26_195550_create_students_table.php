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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->unsignedBigInteger('id_parent');
            $table->foreign('id_parent')->references('id_parent')->on('parents')->onDelete('cascade');
            $table->string('email', 45)->unique();
            $table->string('password');
            $table->string('fname', 45);
            $table->string('lname', 45);
            $table->date('date_of_birth');
            $table->string('phone', 15);      
            $table->string('status')->default('student');
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
        Schema::dropIfExists('students');
    }
};
