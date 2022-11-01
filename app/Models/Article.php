<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property User $author
*/
final class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'author_id',
    ];

    /**
     * @return BelongsTo<User, Article>
    */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return HasMany<Comment, Article>
     */
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }
}
