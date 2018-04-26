<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthday')->nullable();
            $table->string('passport')->nullable();
            $table->string('residence')->nullable();
            $table->string('phone')->nullable();

            # Patient part
            $table->unsignedInteger('diagnostic_card_id')->nullable();

            # Employee part
            $table->dateTime('hired_at')->nullable();
            $table->dateTime('fired_at')->nullable();
            $table->boolean('is_present')->nullable();
            $table->text('about')->nullable();

            # Doctor part
            $table->string('degree')->nullable();

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
