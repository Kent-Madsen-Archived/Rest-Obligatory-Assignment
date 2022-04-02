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
        Schema::create( 'password_resets', 
            function ( Blueprint $table ) 
            {
                $table->id();

                $table->bigInteger('email_id')->unsigned()->index();

                $table->string('token');
                
                $table->timestamp('created_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('password_resets');
    }
};