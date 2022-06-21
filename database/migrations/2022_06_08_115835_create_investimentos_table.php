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
        Schema::create('investimentos', function (Blueprint $table) {
            $table->id();
            $table->integer('modalidade');
            $table->float('valor');
            $table->date('data_pagamento')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->longText('cprf')->nullable();
            $table->date('assinatura')->nullable();
            $table->bigInteger('produto_id')->unsigned();
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
        Schema::dropIfExists('investimentos');
    }
};
