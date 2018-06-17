<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seance_id');
            $table->unsignedInteger('classifier_id');
            $table->unsignedInteger('diagnostic_group_id');
            $table->unsignedInteger('test_id')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->float('raw_value')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seance_id')->references('id')
                ->on('seances')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classifier_id')->references('id')
                ->on('classifiers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('diagnostic_group_id')->references('id')
                ->on('diagnostic_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('test_id')->references('id')
                ->on('tests')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}
