<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncioFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anuncio_id')->references('id')->on('anuncios');
            $table->char('foto_destaque', 1);
            $table->string('nome_arquivo', 50);
            $table->string('pasta', 50);
            $table->string('extensao', 3);
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
        Schema::dropIfExists('anuncio_fotos');
    }
}
