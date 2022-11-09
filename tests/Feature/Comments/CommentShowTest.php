<?php

declare(strict_types=1);

namespace Tests\Feature\Comments;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Tests\TestCase;

final class CommentShowTest extends TestCase
{
    public function test_will_show_comments_successfully(): void
    {
        $article = Article::factory()->create();
        $commentOne = Comment::factory()->create();
        $commentTwo = Comment::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('comments.index', $article->id))
            ->assertStatus(200)
            ->assertJsonFragment([
                "items" => [
                    [
                        "id" => $commentOne->id,
                        "text" => $commentOne->text,
                        "author_id" => $commentOne->author_id,
                        "article_id" => $commentOne->article_id,
                    ],
                    [
                        "id" => $commentTwo->id,
                        "text" => $commentTwo->text,
                        "author_id" => $commentTwo->author_id,
                        "article_id" => $commentTwo->article_id,
                    ],
                ],
            ])
            ->assertJsonFragment([
                'total' => 2,
                "current" => 1,
                "per_page" => 10
            ]);
    }

    public function test_will_show_one_comment_successfully(): void
    {
        $article = Article::factory()->create();
        $comment = Comment::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('comments.show',
                    ["article" => $article->id, "comment" => $comment->id]
                )
            )
            ->assertStatus(200)
            ->assertJson([
                'text' => $comment->text,
                'article_id' => $comment->article_id,
            ]);
    }
}
