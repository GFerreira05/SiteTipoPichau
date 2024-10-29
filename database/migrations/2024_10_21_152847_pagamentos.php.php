<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    { 
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedidos_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('total')->constrained('pedidos')->onDelete('cascade');
            $table->timestamp("data_pagamento")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean("status")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};
