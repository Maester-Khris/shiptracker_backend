<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("guest_name");
            $table->string("guest_email");
            $table->string("message_subject");
            $table->string("message_type")->default('information');
            $table->string("expedition_code")->nullable();
            $table->text("message_content");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
