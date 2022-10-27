<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleRequest;
use App\Http\Resources\Articles\ArticleResource;
use App\Repositories\Article\ArticleRepository;
use App\Services\Articles\ArticleService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService,
        private ArticleRepository $articleRepository,
    ) {
    }

    public function index(): JsonResponse
    {
        $articles = $this->articleRepository->getAll();

        return response()->json(ArticleResource::collection($articles), Response::HTTP_OK);
    }

    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->articleService->createArticle($request);

        return response()->json(new ArticleResource($article), Response::HTTP_OK);
    }
}
