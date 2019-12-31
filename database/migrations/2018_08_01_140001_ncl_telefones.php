<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NclTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncl_telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area', 3)->default('+55')->nullable();
            $table->string('ddd', 3)->nullable();
            $table->string('telefone')->nullable();
            $table->integer('tipo')->nullable();
            $table->timestamp('dt_criacao')->useCurrent();
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
        Schema::drop('ncl_telefones');
    }
}
