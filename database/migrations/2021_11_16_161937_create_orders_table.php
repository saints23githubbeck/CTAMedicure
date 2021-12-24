<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('note')->nullable();
            $table->boolean('status')->default(0);
<<<<<<< HEAD
            $table->foreignId('user_id')->default('1');
            $table->foreignId('delivery_option_id')->constrained();
=======
            $table->foreignId('user_id')->constrained();
            $table->foreignId('delivery_option_id')->nullable()->constrained();
>>>>>>> cedd6d8fca133f414378940b3eab8bbbf1dcb36f
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
        Schema::dropIfExists('orders');
    }
}
