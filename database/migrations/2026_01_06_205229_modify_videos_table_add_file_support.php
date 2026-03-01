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
        Schema::table('videos', function (Blueprint $table) {
            // Cambiar video_url para que pueda ser nulo (para videos subidos)
            $table->string('video_url')->nullable()->change();
            
            // Añadir campos para videos subidos
            $table->string('video_path')->nullable()->after('video_url');
            $table->string('original_filename')->nullable()->after('video_path');
            $table->string('file_size')->nullable()->after('original_filename');
            $table->string('file_type')->nullable()->after('file_size');
            $table->enum('video_type', ['url', 'uploaded'])->default('url')->after('file_type');
            
            // Añadir thumbnail_path para thumbnails subidos
            $table->string('thumbnail_path')->nullable()->after('thumbnail_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('video_url')->nullable(false)->change();
            $table->dropColumn([
                'video_path', 
                'original_filename', 
                'file_size', 
                'file_type', 
                'video_type',
                'thumbnail_path'
            ]);
        });
    }
};