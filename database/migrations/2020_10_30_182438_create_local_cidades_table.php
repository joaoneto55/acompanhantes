<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_cidades', function (Blueprint $table) {
            $table->id();
            $table->integer("uf_codigo");
            $table->char("uf_sigla", 2);
            $table->string("uf_nome", 20);
            $table->integer("cidade_codigo");
            $table->string("cidade_nome", 70);
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
        Schema::dropIfExists('local_cidades');
    }
}
