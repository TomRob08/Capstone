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
        Schema::create('ctf_users', function (Blueprint $table) {
            $table->increments('id')->start_from(1000);
            $table->string('username');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken()->invisible()->nullable(); 
            $table->boolean('isAdmin')->default(0);           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctf_users');
    }
};