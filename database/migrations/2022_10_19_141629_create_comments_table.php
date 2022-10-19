<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->foreignId('author_id');
            $table->foreignId('article_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
