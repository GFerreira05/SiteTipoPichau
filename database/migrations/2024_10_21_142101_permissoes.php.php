<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    { 
        Schema::create('permissoes', function (Blueprint $table) {
            $table->id();
            $table->string('permissao', 100);
            $table->timestamp('data_atribuida')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissoes');
    }
};
