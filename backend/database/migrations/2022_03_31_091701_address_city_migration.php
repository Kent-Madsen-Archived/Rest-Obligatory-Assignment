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
        Schema::create( 'address_city', 
            function ( Blueprint $table ) 
            {
                $table->id(); 
                $table->unsignedBigInteger('address_country_id');

                $table->string('city_name')->unique();

                $table->foreign('address_country_id')->references('id')->on('address_country');
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
        Schema::dropIfExists('address_city');
    }
};