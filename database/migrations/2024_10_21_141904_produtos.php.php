<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->foreignId('cat_id')->constrained('categoria')->onDelete('cascade');
            $table->decimal("preco", 8, 2);
            $table->integer("estoque");
            $table->string("fabricante");
            $table->string("descricao")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
