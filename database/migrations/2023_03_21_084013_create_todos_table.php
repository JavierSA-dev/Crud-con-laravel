<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('user_email');
            $table->string('categorias');
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamps();
        });

        Schema::table('todos', function (Blueprint $table) {
            $table->foreign('user_email')->references('email')->on('users');
            $table->foreign('categorias')->references('name')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
