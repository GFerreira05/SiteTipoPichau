<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('itens_do_pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedidos_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('produtos_id')->constrained('produtos')->onDelete('cascade');
            $table->foreignId('preco')->constrained('produtos')->onDelete('cascade');
            $table->decimal("preco_unitario", 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens_do_pedido');
    }
};
