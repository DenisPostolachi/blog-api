<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Mappers\ArticleDataMapper;
use App\Http\Requests\Articles\ArticleRequest;
use App\Http\Resources\Articles\ArticleResource;
use App\Models\Article;
use App\Repositories\Article\ArticleRepository;
use App\Services\Articles\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService,
        private ArticleRepository $articleRepository,
        private ArticleDataMapper $articleDataMapper,
    ) {
    }

    public function index(): JsonResponse
    {
        $articles = $this->articleRepository->getAllWithPagination();
        $paginatedResponse = $this->articleDataMapper->mapToPaginatedResponse($articles);

        return response()->json($paginatedResponse, Response::HTTP_OK);
    }

    public function store(ArticleRequest $request): JsonResponse
    {
        $articleData = $this->articleDataMapper->mapFromRequestToNormalized($request);
        //@phpstan-ignore-next-line
        $article = $this->articleService->createArticle($articleData, Auth::id());

        return response()->json(new ArticleResource($article), Response::HTTP_OK);
    }

    public function show(Article $article): JsonResponse
    {
       return response()->json(new ArticleResource($article), Response::HTTP_OK);
    }

    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $articleData = $this->articleDataMapper->mapFromRequestToNormalized($request);
        //@phpstan-ignore-next-line
        $article = $this->articleService->updateArticle($articleData, $article, Auth::id());

        return response()->json(new ArticleResource($article), Response::HTTP_OK);
    }

    public function destroy(Article $article): JsonResponse
    {
        $article->delete();

        return response()->json(status: Response::HTTP_OK);
    }
}
