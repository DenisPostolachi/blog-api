<?php

declare(strict_types=1);

namespace Tests\Feature\Articles;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ArticleUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_will_update_article()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create(['author_id' => $user->id]);
        $data = Article::factory()->make(['author_id' => $user->id])->getAttributes();

        $this
            ->actingAs($user)
            ->putJson(route('articles.update',  $article->id), $data)
            ->assertOk()
            ->assertJson([
                'title' => $data['title'],
                'text' => $data['text'],
                'author' => $user->name,
            ])
        ;
    }
}
