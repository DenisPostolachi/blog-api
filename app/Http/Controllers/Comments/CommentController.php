<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Http\Mappers\CommentDataMapper;
use App\Http\Requests\Comments\CommentRequest;
use App\Http\Resources\Comments\CommentResource;
use App\Models\Article;
use App\Models\Comment;
use App\Repositories\Comment\CommentRepository;
use App\Services\Comments\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class CommentController extends Controller
{
    public function __construct(
        private CommentRepository $commentRepository,
        private CommentDataMapper $commentDataMapper,
        private CommentService    $commentService
    )
    {
    }

    public function index(): JsonResponse
    {
        $comments = $this->commentRepository->getAll();

        return response()->json(CommentResource::collection($comments), Response::HTTP_OK);
    }

    public function store(Article $article, CommentRequest $request): JsonResponse
    {
        $commentData = $this->commentDataMapper->mapFromRequestToNormalized($request);
        $comment = $this->commentService->createComment(Auth::id(), $article->id, $commentData);

        return response()->json(new CommentResource($comment), Response::HTTP_OK);
    }

    public function show(Comment $comment): JsonResponse
    {
        return response()->json(new CommentResource($comment), Response::HTTP_OK);
    }

    public function update(Article $article, Comment $comment, CommentRequest $request): JsonResponse
    {
        $commentData = $this->commentDataMapper->mapFromRequestToNormalized($request);
        $comment = $this->commentService->updateComment($comment, $commentData);

        return response()->json(new CommentResource($comment), Response::HTTP_OK);
    }
}
