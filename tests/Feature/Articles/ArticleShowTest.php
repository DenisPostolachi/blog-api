<?php

declare(strict_types=1);

namespace Tests\Feature\Articles;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ArticleShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_will_show_articles_successfully(): void
    {
        $articleOne = Article::factory()->create();
        $articleTwo = Article::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('articles.index'))
            ->assertStatus(200)
            ->assertJsonFragment([
                "items" => [
                    [
                        "id" => $articleOne->id,
                        "title" => $articleOne->title,
                        "text" => $articleOne->text,
                        "author_id" => $articleOne->author->id,
                        "created_at" => $articleOne->created_at,
                        "updated_at" => $articleOne->updated_at,
                    ],
                    [
                        "id" => $articleTwo->id,
                        "title" => $articleTwo->title,
                        "text" => $articleTwo->text,
                        "author_id" => $articleTwo->author->id,
                        "created_at" => $articleTwo->created_at,
                        "updated_at" => $articleTwo->updated_at,
                    ],
                ],
            ])
            ->assertJsonFragment([
                'total' => 2,
                "current" => 1,
                "per_page" => 10
            ])
        ;
    }

    public function test_will_show_one_article_successfully(): void
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('articles.show', $article->id))
            ->assertStatus(200)
            ->assertJson([
                'title' => $article->title,
                'text' => $article->text,
                'author' => $article->author->name,
            ]);
    }
}
