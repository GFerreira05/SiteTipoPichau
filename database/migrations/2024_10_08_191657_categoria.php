<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->id(); //Inteiro AutoIncremento PK => id
            $table->string("nome");
            $table->string("descricao");
            $table->boolean("status")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
};
