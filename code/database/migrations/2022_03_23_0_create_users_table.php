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
            
            $table->string('username');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            
            $table->bigInteger('email_id')->unsigned()->unique();
            $table->foreign('email_id')->references('id')->on('account_mail');
            
            $table->timestamp('email_verified_at')->nullable()->useCurrent();

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
        Schema::dropIfExists('users');
    }
}
