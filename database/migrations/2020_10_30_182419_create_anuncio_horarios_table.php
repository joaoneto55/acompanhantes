<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncioHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anuncio_id')->references('id')->on('anuncios');
            $table->string('descricao', 50);
            $table->time('hora_inicio', 0);
            $table->time('hora_final', 0);
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
        Schema::dropIfExists('anuncio_horarios');
    }
}
