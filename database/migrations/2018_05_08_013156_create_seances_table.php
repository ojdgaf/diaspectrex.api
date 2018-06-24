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
            $table->text('complaints')->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->softDeletes();

            $table->foreign('examination_id')->references('id')
                ->on('examinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
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
