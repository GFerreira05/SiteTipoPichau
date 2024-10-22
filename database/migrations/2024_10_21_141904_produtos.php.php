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
            $table->string("prod_nome");
            $table->foreignId('cat_id')->constrained('categoria')->onDelete('cascade');
            $table->decimal("prod_preco", 8, 2);
            $table->integer("prod_estoque");
            $table->string("prod_fabricante");
            $table->timestamp("prod_adicionado")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string("prod_descricao")->nullable();
            $table->boolean("prod_ativo")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
