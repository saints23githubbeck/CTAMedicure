<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userName')->notNull();
            $table->string('email')->unique();
            $table->string('contactNumber')->notNull();
            $table->integer('role_id')->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
         

          

            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function($table)
{

    $table->foreign('role_id')->references('id')->on('roles');


});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
