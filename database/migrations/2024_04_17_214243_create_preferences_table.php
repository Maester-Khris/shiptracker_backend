<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // ON DELETE CASCADE
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->json("alert");
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferences');
    }
};
