<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleRequest;
use App\Http\Resources\Articles\ArticleResource;
use App\Models\Article;
use App\Services\Articles\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService,
    )
    {
    }

    public function index(): JsonResponse
    {
        $articles = Article::all();
        return response()->json(ArticleResource::collection($articles), Response::HTTP_OK);
    }

    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->articleService->createArticle($request);
        return response()->json(new ArticleResource($article), Response::HTTP_OK);
    }
}
