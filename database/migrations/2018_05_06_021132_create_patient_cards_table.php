<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('patient_type_id');
            $table->text('allergies')->nullable();
            $table->text('diseases')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('patient_type_id')->references('id')
                ->on('patient_types')->onUpdate('cascade')->omDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_cards');
    }
}
