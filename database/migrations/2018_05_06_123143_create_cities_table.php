<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')
                ->on('countries')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('region_id')->references('id')
                ->on('regions')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function(Blueprint $table){
            $table->dropForeign(['country_id', 'region_id']);
        });
        Schema::dropIfExists('cities');
    }
}
