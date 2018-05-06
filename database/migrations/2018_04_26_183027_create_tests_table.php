<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('diagnostic_group_id');

            $table->float('D2');
            $table->float('D3');
            $table->float('D4');
            $table->float('D5');
            $table->float('D6');
            $table->float('D8');
            $table->float('D11');
            $table->float('D15');
            $table->float('D20');
            $table->float('D26');
            $table->float('D36');
            $table->float('D40');
            $table->float('D65');
            $table->float('D85');
            $table->float('D120');
            $table->float('D150');
            $table->float('D210');
            $table->float('D290');
            $table->float('D300');
            $table->float('D520');
            $table->float('D700');
            $table->float('D950');
            $table->float('D1300');
            $table->float('D1700');
            $table->float('D2300');
            $table->float('D3100');
            $table->float('D4200');
            $table->float('D5600');
            $table->float('D7600');
            $table->float('D10200');
            $table->float('D13800');
            $table->float('D18500');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('diagnostic_group_id')
                ->references('id')->on('diagnostic_groups')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
