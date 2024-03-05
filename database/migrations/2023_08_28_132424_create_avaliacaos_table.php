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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            /**$table->foreignId('user_id')->constrained('users')->default(null);*/
            $table->foreignId('sabor_id')->constrained('sabor')->default(null)->onDelete('cascade');
            $table->foreignId('filial_id')->nullable()->constrained('filial')->default(null)->onDelete('set null');
            $table->foreignId('nota_id')->constrained('nota')->default(null);
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
