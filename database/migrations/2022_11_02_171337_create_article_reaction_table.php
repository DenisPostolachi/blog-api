<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_reaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->unsignedBigInteger('reaction_id');
            $table->foreign('reaction_id')->references('id')->on('reactions');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_reaction');
    }
};
