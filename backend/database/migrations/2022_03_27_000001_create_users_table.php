<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * 
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'users', 
            function ( Blueprint $table ) 
            {
                $table->id();
                $table->string('username');
                
                
                $table->bigInteger('email_id')->unsigned()->unique();
                $table->timestamp('email_verified_at')->nullable()->useCurrent();

                $table->string('password');
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('email_id')->references('id')->on('mailing_lists');
            }
        );
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
};