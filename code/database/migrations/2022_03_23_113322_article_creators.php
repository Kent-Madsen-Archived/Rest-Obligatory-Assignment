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
        Schema::create('article_creators', function (Blueprint $table) 
        {
            $table->id();
            
            $table->bigInteger('article_user_role_id')->unsigned();
            $table->foreign('article_user_role_id')->references('id')->on('article_creator_roles');

            $table->bigInteger('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');
            
            $table->bigInteger('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles');
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
        Schema::dropIfExists('article_creators');
    }
};
