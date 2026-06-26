<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->Constraints('doctors');
            $table->string('name');
            $table->integer('age');
            $table->string('phone');
            $table->string('address');
            $table->string('gender');
            $table->string('companion_name')->nullable();
            $table->string('companion_phone')->nullable();
            $table->date('registration_date');
            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
}
