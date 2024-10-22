<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    { 
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuarios_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('cidades_id')->constrained('cidades')->onDelete('cascade');
            $table->string("endereco", 255);
            $table->string("cep", 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
