<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('cardNumber')->nullable();
            $table->string('first_6digits')->nullable();
            $table->string('last_4digits')->nullable();
            $table->string('issuer')->nullable();
            $table->string('country')->nullable();
            $table->string('type')->nullable();
            $table->string('expiry')->nullable();
            $table->string('expiryDate')->nullable();
            $table->integer('cvNumber')->nullable();
            $table->foreignId('order_id')->constrained();
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
        Schema::dropIfExists('card_payments');
    }
}
