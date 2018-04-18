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
            $table->string('name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('organization')->nullable();
            $table->tinyInteger('index_number')->unsigned()->nullable(); //218018
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->index();
            $table->string('phone',10)->nullable();
            $table->string('organization')->nullable();
            $table->string('student_id',8)->nullable()->unique()->index();
            $table->string('provider'); //social login provider
            $table->string('provider_id');
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
