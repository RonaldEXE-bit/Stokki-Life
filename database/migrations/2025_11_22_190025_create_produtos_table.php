<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folder_id'); // <-- chave estrangeira
            $table->string('nome');
            $table->text('descricao')->nullable();
           
            $table->integer('estoque')->default(0);
            $table->integer('quantidade')->default(0); 
            $table->date('data_vencimento')->nullable();   // <-- novo campo
    $table->integer('dias_restantes')->nullable(); // <-- novo campo
            $table->timestamps();
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('produtos');
    }
};
