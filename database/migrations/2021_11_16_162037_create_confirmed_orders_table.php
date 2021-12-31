<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmed_orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2)->nullable();
            $table->decimal('payment', 8, 2)->nullable();
            $table->decimal('due', 8, 2)->nullable();
            $table->string('pay_by')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('note')->nullable();
            $table->boolean('status')->default(0);
            $table->foreignId('order_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('confirmation_orders');
    }
}
