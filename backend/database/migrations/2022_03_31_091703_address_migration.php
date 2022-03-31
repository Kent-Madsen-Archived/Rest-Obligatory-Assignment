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
        Schema::create( 'address', 
            function ( Blueprint $table ) 
            {
                $table->id(); 

                $table->unsignedBigInteger('address_city_id');
                $table->unsignedBigInteger('address_province_id');

                $table->string('address_number');

                $table->foreign('address_city_id')->references('id')->on('address_city');
                $table->foreign('address_province_id')->references('id')->on('address_city_province');

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
        Schema::dropIfExists('address');
    }
};