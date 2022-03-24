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
        Schema::create('accounts', function (Blueprint $table) 
        {
            $table->id();
            
            $table->string('nickname');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();

            $table->bigInteger('email_id')->unsigned();
            $table->foreign('email_id')->references('id')->on('account_mail');
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
};
