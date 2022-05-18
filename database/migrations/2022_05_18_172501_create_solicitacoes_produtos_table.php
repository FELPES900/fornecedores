<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soli_id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->timestamps();

            $table->foreign('soli_id')->references('id')->on('solicitacao');
            $table->foreign('prod_id')->references('id')->on('produtos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacoes_produtos');
    }
};
