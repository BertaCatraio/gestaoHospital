<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patientId');
            $table->unsignedBigInteger('doctorId');
            $table->unsignedBigInteger('examTypeId');
            $table->date('exam_date');
            $table->text('result')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('patientId')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('examTypeId')->references('id')->on('examtypes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
