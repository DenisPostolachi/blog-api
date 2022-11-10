<?php

declare(strict_types=1);

namespace Tests\Feature\Comments;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

final class CommentUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_will_update_comment_successfully(): void
    {
        $article = Article::factory()->create();
        $comment = Comment::factory()->create(['article_id' => $article->id]);
        $data = Comment::factory()->create(['article_id' => $article->id])->getAttributes();
        $user = User::factory()->create();


        $this
            ->actingAs($user)
            ->putJson(route('comments.update', ['article' => $article->id, 'comment' => $comment->id]), $data)
            ->assertOk()
            ->assertJson([
                "text" => $data['text'],
                "article_id" => $data['article_id']
            ]);
    }
}
