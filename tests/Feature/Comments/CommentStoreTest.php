<?php

declare(strict_types=1);

namespace Tests\Feature\Comments;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class CommentStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_will_store_comment_successfully(): void
    {
        $article = Article::factory()->create();
        $data = Comment::factory()->create(['article_id' => $article->id])->getAttributes();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->postJson(route('comments.store', $article), $data)
            ->assertOk()
            ->assertJson([
                "text" => $data['text'],
                "article_id" => $data['article_id']
            ]);
    }
}
