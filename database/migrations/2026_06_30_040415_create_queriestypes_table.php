<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queriestypes', function (Blueprint $table) {

            $table->string('general_consultation');
            $table->string('routine_consultation');
            $table->string('pediatrecs');
            $table->string('obstetrecs');
            $table->string('cardiology');
            $table->string('orthopidics');
            $table->string('dermatology');
            $table->string('psychiatry');
            $table->string('ophthalmology');
            $table->string('neurology');
            $table->string('emergency');
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
        //
    }
}
