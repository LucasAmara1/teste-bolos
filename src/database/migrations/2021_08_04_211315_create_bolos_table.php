<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->integer('peso');
            $table->integer('valor');
            $table->integer('quantidade');
            $table->boolean('notificar')->default(0);
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
        Schema::dropIfExists('bolos');
    }
}
