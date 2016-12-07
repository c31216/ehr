<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('vaccination_date');
            $table->integer('v_id');
            $table->integer('u_id');
            $table->integer('status');
            $table->integer('status2');
            $table->string('notification');
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
        Schema::dropIfExists('vaccination_statuses');
    }
}
