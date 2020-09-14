<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoreArquivosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('tamanho')->nullable();
            $table->string('tipo')->nullable();
            $table->string('extensao', 4)->nullable();
            $table->longText('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('core_arquivos');
    }
}
