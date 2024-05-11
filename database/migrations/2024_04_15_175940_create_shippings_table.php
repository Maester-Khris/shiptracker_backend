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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("sender");
            $table->string("receiver");
            $table->string("status_exp")->default("ORDERED");
            $table->string("route_uuid")->nullable();
            $table->integer("actual_point_id")->nullable();
            $table->string("reference_exp")->nullable();
            $table->string("codebar_url")->nullable();
            $table->string("codebar_digit")->nullable();
            $table->datetime("departure_date")->nullable();
            $table->datetime("arrival_date")->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('shippings');
    }
};
