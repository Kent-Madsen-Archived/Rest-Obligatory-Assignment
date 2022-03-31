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
        Schema::create( 'address_city_province', 
            function ( Blueprint $table ) 
            {
                $table->id(); 

                $table->biginteger('address_city_province_label_id')->unsigned();
                $table->biginteger('postal_code')->unsigned();
                $table->foreign( 'address_city_province_label_id' )->references( 'id' )->on( 'address_city_province_label' );
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
        Schema::dropIfExists('address_city_province');
    }
};
