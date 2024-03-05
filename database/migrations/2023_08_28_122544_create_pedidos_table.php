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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            /**$table->foreignId('user_id')->constrained('users')->default(null);*/
            $table->foreignId('sabor_id')->constrained('sabor')->default(null)->onDelete('cascade');
            $table->integer('quantidade');
            $table->foreignId('filial_id')->constrained('filial')->default(null)->onDelete('cascade');
            $table->foreignId('retirada_id')->nullable()->constrained('retirada')->default(null)->onDelete('set null');
            $table->foreignId('pagamento_id')->nullable()->constrained('pagamento')->default(null)->onDelete('set null');
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
