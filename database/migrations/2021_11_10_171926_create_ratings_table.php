<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('worker_service_id');
            $table->text('comment');
            $table->tinyInteger('rate');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('worker_service_id')->references('id')->on('worker_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ratings');
        Schema::enableForeignKeyConstraints();
    }
}
