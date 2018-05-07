<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('street_id');
            $table->string('building',10);
            $table->unsignedSmallInteger('flat')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')
                ->on('countries')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('region_id')->references('id')
                ->on('regions')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('city_id')->references('id')
                ->on('cities')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('street_id')->references('id')
                ->on('streets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign(['country_id', 'region_id', 'city_id', 'street_id']);
        });
        Schema::dropIfExists('addresses');
    }
}
