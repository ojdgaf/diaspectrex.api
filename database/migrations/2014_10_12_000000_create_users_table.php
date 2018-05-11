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
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('sex', ['male', 'female']);
            $table->date('birthday');
            $table->unsignedInteger('address_id')->nullable();

            # Employee part
            $table->string('passport')->nullable();
            $table->boolean('is_present')->nullable();
            $table->text('about')->nullable();
            $table->dateTime('hired_at')->nullable();
            $table->dateTime('fired_at')->nullable();

            # Doctor part
            $table->string('degree')->nullable();

            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
