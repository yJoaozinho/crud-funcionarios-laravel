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
    Schema::create('funcionarios', function (Blueprint $table) {
        $table->string('cpf')->primary();
        $table->string('nome');
        $table->date('data_nascimento');
        $table->string('telefone');
        $table->enum('genero', ['Masculino', 'Feminino', 'Outro']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
