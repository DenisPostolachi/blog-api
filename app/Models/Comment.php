<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'text',
        'author_id',
        'article_id',
    ];
}
