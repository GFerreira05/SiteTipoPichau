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
            $table->foreignId('estados_id')->constrained('estados')->onDelete('cascade');
            $table->foreignId('paises_id')->constrained('paises')->onDelete('cascade');
            $table->enum('local', ['casa', 'predio', 'condominio']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
