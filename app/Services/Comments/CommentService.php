<?php

declare(strict_types=1);

namespace App\Services\Comments;

use App\Data\CommentData;
use App\Models\Comment;

final class CommentService
{
    public function createComment(int $authorId, int $articleId, CommentData $commentData): Comment
    {
        return Comment::create([
            'text' => $commentData->getText(),
            'article_id' => $articleId,
            'author_id' => $authorId,
        ]);
    }

    public function updateComment(Comment $comment, CommentData $commentData): Comment
    {
        $comment->update([
            'text' => $commentData->getText(),
        ]);

        return $comment;
    }
}
