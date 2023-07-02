<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('id',32)->unique();
            $table->string('nombres',150);
            $table->string('apellidos',150);      
            $table->string('telefono',50);
            $table->string('mail',150);
            $table->string('pass',25);
            $table->string('token',150)->default('');
            $table->integer('tipo')->default(0);

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
        Schema::dropIfExists('usuarios');
    }
}
