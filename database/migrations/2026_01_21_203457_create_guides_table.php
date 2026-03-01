<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('guide_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('order')->default(0);
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('guide_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_section_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content')->nullable();
            $table->enum('content_type', ['text', 'list', 'commands', 'note']);
            $table->json('items')->nullable(); // Para listas, comandos
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('guide_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->enum('file_type', ['txt', 'json', 'md']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guide_files');
        Schema::dropIfExists('guide_steps');
        Schema::dropIfExists('guide_sections');
        Schema::dropIfExists('guides');
    }
};
