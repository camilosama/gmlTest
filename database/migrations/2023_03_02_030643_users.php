<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('document')->primary();
            $table->string('name',100);
            $table->string('last_name',100);
            $table->string('country');
            $table->string('address',180);
            $table->string('phone');
            $table->string('email',150)->unique();
            $table->integer('id_rol')->foreign('id_rol')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
