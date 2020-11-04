<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            /*Campos personalizados*/
            $table->char('ativo')->default('0');
            $table->timestamp('validacao_email', 0)->nullable();
            $table->timestamp('termos_de_uso', 0)->nullable();
            $table->char('usuario_tipo')->nullable(); // Usuario padrão, Usuario Pro
            $table->timestamp('ultimo_login', 0)->nullable()->nullable();
            $table->string('ultimo_ip', 15)->nullable();
            $table->string('observacao')->nullable();

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
        Schema::dropIfExists('users');
    }
}
