<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ship_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shipping_id")->nullable();
            $table->string("reference_num");
            $table->string("description");
            $table->float("weight");
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ship_packages');
    }
};
