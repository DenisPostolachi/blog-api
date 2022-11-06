<?php

declare(strict_types=1);

namespace App\Http\Resources\Reactions;

use App\Models\Reaction;
use Illuminate\Http\Resources\Json\JsonResource;

class ReactionResource extends JsonResource
{
    public function __construct(private Reaction $articleReaction)
    {
        parent::__construct($articleReaction);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'text' => $this->articleReaction->text,
            'created_at' => $this->articleReaction->created_at,
            'updated_at' => $this->articleReaction->updated_at,
        ];
    }
}
