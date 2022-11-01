<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

final class CommentRepository
{
    /**
     * @return Collection<int, Comment>
     */
    public function getAll(): Collection
    {
        return Comment::all();
    }
}
