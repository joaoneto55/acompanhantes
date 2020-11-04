<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('nome', 50);
            $table->text('descricao', 50)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            //$table->foreignId('cidade_id')->references('id')->on('local_cidades');
            $table->string('cidade', 50)->nullable();

            //Atributos
            $table->char('idade', 2); //anos, >18 && <99
            $table->char('altura', 3); //cm, >100 <220
            $table->char('peso', 2); //Kg, >40 && <200
            $table->char('tipo_corporal', 1); //magrela, magra, em forma, musculosa, nem acima nem abaixo, um pouco acima do peso, bem acima do peso
            $table->char('cabelo_cor', 1)->nullable(); //loiros, pretos, castanhos, ruivos, brancos, pintado de outra cor
            $table->char('cabelo_tamanho', 1)->nullable(); //careca, raspado, muito curto, curto, médio, longos, muito longos
            $table->char('seios_tamanho', 1)->nullable(); //pequenos, médios, grandes
            $table->char('silicone', 1)->nullable(); //silicone, natural
            $table->char('depilacao_tipo', 1)->nullable(); //depilada, aparada, natural, peluda
            $table->char('cor_pele_etnia', 1)->nullable(); //branca, negra, mulata, indígena, asiática
            $table->char('fala_ingles', 1)->nullable();
            $table->char('fala_espanhol', 1)->nullable();
            $table->char('fala_frances', 1)->nullable();
            $table->char('fala_italiano', 1)->nullable();
            $table->char('fala_alemao', 1)->nullable();

            //Serviços            
            $table->char('posicao_69', 1)->nullable();
            $table->char('sexo_anal', 1)->nullable();
            //$table->char('bondage', 1);
            $table->char('vende_fotos', 1)->nullable();
            $table->char('vende_videos', 1)->nullable();
            $table->char('video_chamada', 1)->nullable();
            $table->char('ejaculacao_rosto', 1)->nullable();
            $table->char('ejaculacao_corpo', 1)->nullable();
            $table->char('oral_completo', 1)->nullable();
            $table->char('garganta_profunda', 1)->nullable();
            $table->char('dirty_talk', 1)->nullable();
            //$table->char('domination', 1);
            $table->char('atende_dupla', 1)->nullable(); //atende em com outra garota
            $table->char('massagem_erotica', 1)->nullable();
            $table->char('massagem_relaxante', 1)->nullable();
            //$table->char('podolatria', 1);
            $table->char('beija_na_boca', 1)->nullable();
            $table->char('estilo_namorada', 1)->nullable();
            $table->char('golden_shower_give', 1)->nullable();
            $table->char('golden_shower_receive', 1)->nullable();
            $table->char('sexo_em_grupo', 1)->nullable();
            //$table->char('Handjob', 1);
            //$table->char('Kamasutra', 1);
            //$table->char('Masturbation', 1);
            //$table->char('Mistress', 1);
            $table->char('oral_sem_camisinha', 1)->nullable();
            $table->char('beijo_grego_ativo', 1)->nullable();
            $table->char('beijo_grego_passivo', 1)->nullable();
            $table->char('role_play', 1)->nullable();
            $table->char('espanhola', 1)->nullable();
            $table->char('brinquedos', 1)->nullable();
            $table->char('squirting', 1)->nullable();
            $table->char('striptease', 1)->nullable();
            //$table->char('submissive', 1);
            //$table->char('swallowing', 1);
            $table->char('roupas_fantasias', 1)->nullable();
            //$table->char('Video with sex', 1);
            $table->char('atende_dois_homens', 1)->nullable();
            $table->char('atende_casal', 1)->nullable();
            $table->char('atende_mulher', 1)->nullable();
            $table->char('dupla_penetracao', 1)->nullable();
            
            //Atende em
            $table->char('possui_local', 1)->nullable();
            $table->char('local_do_cliente', 1)->nullable();
            $table->char('motel', 1)->nullable();

            $table->timestamp('subida_anuncio')->nullable();
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
        Schema::dropIfExists('anuncios');
    }
}
