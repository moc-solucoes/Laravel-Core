<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NclDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncl_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->foreign('id_usuario')->references('id')->on('auth_usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tipo');
            $table->string('numero');
            $table->text('completo');
            $table->boolean('ativo')->default(true);
            $table->timestamp('dt_criacao')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ncl_documentos');
    }
}
