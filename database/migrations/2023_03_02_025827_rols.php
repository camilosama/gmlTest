<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rols extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('rols', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('description')->unique();
            $table->boolean('state')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('rols');
    }
}
