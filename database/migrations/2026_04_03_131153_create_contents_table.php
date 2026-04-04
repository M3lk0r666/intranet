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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
        
            // Básico
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
        
            // Tipo de contenido
            $table->enum('type', ['pdf', 'guide']);
        
            // Archivos (PDF)
            $table->string('file_path')->nullable();
            $table->string('original_filename')->nullable();
            $table->string('file_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
        
            // Contenido (guías)
            $table->longText('content')->nullable();
        
            // Extras
            $table->string('thumbnail')->nullable();
        
            // Relaciones
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        
            // Estado
            $table->boolean('status')->default(true);
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
