<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('examination_id');
            $table->unsignedInteger('doctor_id')->nullable();
            $table->unsignedInteger('patient_card_id');
            $table->unsignedInteger('test_id')->nullable();
            $table->unsignedInteger('diagnostic_group_id')->nullable();
            $table->text('complains')->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('comment')->nullable();
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->nullable();
            $table->softDeletes();

            $table->foreign('examination_id')->references('id')
                ->on('examinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('patient_card_id')->references('id')
                ->on('patient_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('test_id')->references('id')
                ->on('tests')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seances', function(Blueprint $table){
            $table->dropForeign(['examination_id', 'doctor_id', 'patient_card_id', 'test_id']);
        });
        Schema::dropIfExists('seances');
    }
}
