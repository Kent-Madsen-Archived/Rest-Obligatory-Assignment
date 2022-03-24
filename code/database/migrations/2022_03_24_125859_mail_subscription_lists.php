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
        Schema::create('mail_subscription_lists', function (Blueprint $table) 
        {
            $table->id();
            
            $table->bigInteger('email_id')->unsigned();
            $table->foreign('email_id')->references('id')->on('account_mail');
            $table->timestamp('email_verified_at')->nullable()->useCurrent();

            $table->bigInteger('mail_subscription_category_id')->unsigned();
            $table->foreign('mail_subscription_category_id')->references('id')->on('mail_subscription_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('mail_subscription_lists');
    }
};
