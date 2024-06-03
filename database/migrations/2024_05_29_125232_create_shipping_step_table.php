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
        Schema::create('shipping_step', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('shipping_id');
            $table->unsignedBiginteger('step_id');
            $table->boolean('step_running');
            $table->date('step_launched');
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->foreign('step_id')->references('id')->on('steps');
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
        Schema::dropIfExists('shipping_step');
    }
};
