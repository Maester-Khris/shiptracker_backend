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
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("sender");
            $table->string("sender_telephone");
            $table->string("receiver");
            $table->string("receiver_telephone");
            $table->string("receiver_address");
            $table->string("receiver_id_photo_url")->nullable();
            $table->string("delivery_town");
            $table->string("status_exp")->default("ORDERED");
            $table->string("reference_exp");
            $table->string("codebar_url")->nullable();
            $table->string("signature_photo_url")->nullable();
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
