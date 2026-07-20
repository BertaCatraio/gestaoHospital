<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId')->constrained()->onDelete('cascade');
            $table->foreignId('doctorId')->constrained()->onDelete('cascade');
            $table->foreignId('queriesId')->nullable()->nullonDelete();

            $table->string('examtype');
            $table->longText('result');
            $table->text('diagonostc')->nullable();
            $table->text('observation')->nullable();
            $table->date('data_exame');
            $table->date('data_resultado')->nullable();
            $table->string('estado')->default('pendente');
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
        Schema::dropIfExists('results');
    }
}
