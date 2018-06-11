<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostic_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_type_id');
            $table->string('name');
            $table->string('display_name');
            $table->text('description')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('diagnostic_groups');
    }
}
