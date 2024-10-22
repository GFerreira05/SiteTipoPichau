<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    { 
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuarios_id')->constrained('usuarios')->onDelete('cascade');
            $table->decimal("total", 10, 2);
            $table->timestamp("data_pedido")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean("status")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
