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
            $table->string('file_path')->nullable();

            $table->float('d2');
            $table->float('d3');
            $table->float('d4');
            $table->float('d5');
            $table->float('d6');
            $table->float('d8');
            $table->float('d11');
            $table->float('d15');
            $table->float('d20');
            $table->float('d26');
            $table->float('d36');
            $table->float('d40');
            $table->float('d65');
            $table->float('d85');
            $table->float('d120');
            $table->float('d150');
            $table->float('d210');
            $table->float('d290');
            $table->float('d300');
            $table->float('d520');
            $table->float('d700');
            $table->float('d950');
            $table->float('d1300');
            $table->float('d1700');
            $table->float('d2300');
            $table->float('d3100');
            $table->float('d4200');
            $table->float('d5600');
            $table->float('d7600');
            $table->float('d10200');
            $table->float('d13800');
            $table->float('d18500');

            $table->timestamps();
            $table->softDeletes();
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
