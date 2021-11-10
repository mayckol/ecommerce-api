<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduling_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->date('available_day');
            $table->time('start_at');
            $table->time('end_at');
            $table->boolean('is_available')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('worker_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduling_services');
    }
}
