<?php

declare(strict_types=1);

namespace App\Http\Controllers\Reactions;

use App\Exceptions\ArticleReactionNotFoundException;
use App\Http\Mappers\ArticleReactionDataMapper;
use App\Http\Requests\ArticleReactions\ArticleReactionRequest;
use App\Http\Resources\ArticleReactions\ArticleReactionResource;
use App\Http\Resources\Reactions\ReactionResource;
use App\Models\Article;
use App\Models\ArticleReaction;
use App\Models\Reaction;
use App\Services\ArticleReactions\ArticleReactionService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ArticleReactionController
{
    public function __construct(
        private ArticleReactionDataMapper $articleReactionDataMapper,
        private ArticleReactionService    $articleReactionService,
    )
    {
    }

    public function index(Article $article): JsonResponse
    {
        $reactions = $article->reactions;

        return response()->json(ReactionResource::collection($reactions), Response::HTTP_OK);
    }

    public function store(Article $article, ArticleReactionRequest $request): JsonResponse
    {
        $articleReactionData = $this->articleReactionDataMapper->mapFromRequestToNormalized($request);
        $articleReaction = $this->articleReactionService->createArticleReaction($articleReactionData, $article->id);

        return response()->json(new ArticleReactionResource($articleReaction), Response::HTTP_OK);
    }

    public function update(Article $article, Reaction $reaction, ArticleReactionRequest $request): JsonResponse
    {
        $articleReactionData = $this->articleReactionDataMapper->mapFromRequestToNormalized($request);
        try {
            $articleReaction = $this->articleReactionService->updateArticleReaction($reaction, $articleReactionData, $article->id);

            return response()->json(new ArticleReactionResource($articleReaction), Response::HTTP_OK);
        } catch (ArticleReactionNotFoundException) {
            throw new ArticleReactionNotFoundException('Article reaction not found');
        }
    }

    public function destroy(ArticleReaction $articleReaction): JsonResponse
    {
        $articleReaction->delete();

        return response()->json(status: Response::HTTP_OK);
    }
}
