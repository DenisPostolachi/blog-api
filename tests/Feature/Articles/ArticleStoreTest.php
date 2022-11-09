<?php

declare(strict_types=1);

namespace Tests\Feature\Articles;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ArticleStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_wil_store_article(): void
    {
        $user = User::factory()->create();
        $data = Article::factory()->make(['author_id' => $user->id])->getAttributes();

        $this
            ->actingAs($user)
            ->postJson(route('articles.store'), $data)
            ->assertStatus(200)
            ->assertJson([
                'title' => $data['title'],
                'text' => $data['text'],
                'author' => $user->name,
            ])
        ;
    }
}
