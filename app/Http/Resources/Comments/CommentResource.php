<?php

declare(strict_types=1);

namespace App\Http\Resources\Comments;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

final class CommentResource extends JsonResource
{
    public function __construct(private Comment $comment)
    {
        parent::__construct($comment);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'text' => $this->comment->text,
            'article_id' => $this->comment->article_id,
        ];
    }
}
