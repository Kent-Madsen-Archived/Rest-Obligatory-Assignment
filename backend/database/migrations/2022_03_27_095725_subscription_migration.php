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
        //
        Schema::create( 'subscriptions', 
            function ( Blueprint $table ) 
            {
                $table->id();
                
                $table->bigInteger('category_id')->unsigned();
                $table->bigInteger('mail_id')->unsigned();

                $table->foreign('category_id')->references('id')->on('subscription_category')->onDelete('CASCADE');
                $table->foreign('mail_id')->references('id')->on('mailing_lists')->onDelete('CASCADE');

                $table->timestamps();
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
        //
        Schema::dropIfExists('subscriptions');
    }
};
