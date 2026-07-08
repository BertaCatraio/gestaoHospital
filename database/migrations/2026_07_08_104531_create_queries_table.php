<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patientId');
            $table->unsignedBigInteger('doctorId');
            $table->unsignedBigInteger('queriestypeId');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['agendada', 'concluida', 'cancelada'])->default('agendada');
            $table->text('reason')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();

            $table->foreign('patientId')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('queriestypeId')->references('id')->on('queriestypes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
