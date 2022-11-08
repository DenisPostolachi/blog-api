<?php

declare(strict_types=1);

namespace App\Services\ArticleReactions;

use App\Data\ArticleReactionData;
use App\Models\ArticleReaction;
use App\Models\Reaction;

final class ArticleReactionService
{
    public function createArticleReaction(ArticleReactionData $articleReactionData, int $articleId): ArticleReaction
    {
        return ArticleReaction::create([
            'reaction_id' => $articleReactionData->getReactionId(),
            'article_id' => $articleId,
        ]);
    }

    public function updateArticleReaction(Reaction $reaction, ArticleReactionData $articleReactionData, int $articleId): ArticleReaction
    {
        $articleReaction = ArticleReaction::where('article_id', $articleId)->where('reaction_id', $reaction->id)->first();
        $articleReaction->update([
            'reaction_id' => $articleReactionData->getReactionId(),
            'article_id' => $articleId
        ]);

        return $articleReaction;
    }
}
