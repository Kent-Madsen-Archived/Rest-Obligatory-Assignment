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
                $table->integer('address_country_id')->unsigned();
                $table->integer('address_province_id')->unsigned();
                $table->string('city');
                
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
