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
        Schema::create('file_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_name');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('extension');
            $table->string('mime_type');
            $table->decimal('size', 10, 2); // en KB
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('downloads')->default(0);
            $table->text('description')->nullable();
            $table->string('category')->default('general')->index();
            $table->timestamps();
            $table->softDeletes();

            // Relación con usuarios (opcional)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_documents');
    }
};
