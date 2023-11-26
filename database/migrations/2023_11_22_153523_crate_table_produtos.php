<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nome',50);
            $table->string('descricao',200);
            $table->string('imagem',128)->nullable();
            $table->decimal('preco',10,2);
            $table->date('validade');
            $table->bigInteger('categoria_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
