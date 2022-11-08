<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Data\ArticleReactionData;
use App\Http\Requests\ArticleReactions\ArticleReactionRequest;

final class ArticleReactionDataMapper
{
    public function mapFromRequestToNormalized(ArticleReactionRequest $request): ArticleReactionData
    {
        return (new ArticleReactionData())->setReactionId((int) $request->reaction_id);
    }
}
