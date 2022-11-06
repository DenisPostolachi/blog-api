<?php

declare(strict_types=1);

namespace App\Http\Controllers\Reactions;

use App\Http\Mappers\ReactionDataMapper;
use App\Http\Requests\Reactions\ReactionRequest;
use App\Http\Resources\Reactions\ReactionResource;
use App\Models\Reaction;
use App\Repositories\Reaction\ReactionRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


final class ReactionController
{
    public function __construct(
        private ReactionRepository $reactionRepository,
    )
    {
    }

    public function index(): JsonResponse
    {
        $reactionId = request()->route('article');
        $reactions = $this->reactionRepository->getArticleReaction((int)$reactionId);
        return response()->json(ReactionResource::collection($reactions), Response::HTTP_OK);
    }
}
