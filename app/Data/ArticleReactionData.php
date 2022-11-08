<?php

declare(strict_types=1);

namespace App\Data;

final class ArticleReactionData
{
    private int $reactionId;

    public function getReactionId(): int
    {
        return $this->reactionId;
    }

    public function setReactionId(int $reactionId): self
    {
        $this->reactionId = $reactionId;

        return $this;
    }
}
