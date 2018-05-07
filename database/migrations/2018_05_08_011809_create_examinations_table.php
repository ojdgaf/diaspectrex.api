<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_card_id');
            $table->string('name')->nullable();
            $table->text('conclusion')->nullable();
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->nullable();
            $table->softDeletes();

            $table->foreign('patient_card_id')->references('id')
                ->on('patient_cards')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examinations', function(Blueprint $table){
            $table->dropForeign(['patient_card_id']);
        });
        Schema::dropIfExists('examinations');
    }
}
