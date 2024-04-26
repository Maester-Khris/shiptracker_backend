<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ship_routes', function (Blueprint $table) {
            $table->id();
            $table->string('route_name');
            $table->string('route_uuid');
            $table->json('route_points');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ship_routes');
    }
};
