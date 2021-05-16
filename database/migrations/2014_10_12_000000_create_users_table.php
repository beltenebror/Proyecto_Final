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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('dni')->nullable();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->string('rol')->nullable();
            $table->string('comunidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('poblacion')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();

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
