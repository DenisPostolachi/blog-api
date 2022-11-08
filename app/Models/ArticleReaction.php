<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ArticleReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'reaction_id'
    ];

    protected $table = 'article_reaction';
}
