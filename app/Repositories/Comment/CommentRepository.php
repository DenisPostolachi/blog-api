<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CommentRepository
{
    public function getAllWithPagination(): LengthAwarePaginator
    {
        return Comment::paginate(10);
    }
}
