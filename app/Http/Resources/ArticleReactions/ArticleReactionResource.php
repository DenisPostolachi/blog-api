<?php

declare(strict_types=1);

namespace App\Http\Resources\ArticleReactions;

use App\Models\ArticleReaction;
use Illuminate\Http\Resources\Json\JsonResource;

final class ArticleReactionResource extends JsonResource
{
    public function __construct(private ArticleReaction $articleReaction)
    {
        parent::__construct($articleReaction);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'reaction_id' => $this->articleReaction->id,
        ];
    }
}
