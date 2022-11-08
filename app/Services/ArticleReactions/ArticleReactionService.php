<?php

declare(strict_types=1);

namespace App\Services\ArticleReactions;

use App\Data\ArticleReactionData;
use App\Exceptions\ArticleReactionNotFoundException;
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

    /**
     * @throws ArticleReactionNotFoundException
     */
    public function updateArticleReaction(Reaction $reaction, ArticleReactionData $articleReactionData, int $articleId): ArticleReaction
    {
        $articleReaction = ArticleReaction::where('article_id', $articleId)->where('reaction_id', $reaction->id)->first();

        // add condition to check if articleReaction is not null...and if it is null, thrown an error and catch this error in controller

        if ($articleReaction === null) {
            throw new ArticleReactionNotFoundException();
        }

        $articleReaction->update([
            'reaction_id' => $articleReactionData->getReactionId(),
            'article_id' => $articleId
        ]);

        return $articleReaction;
    }
}
