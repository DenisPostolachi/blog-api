<?php

declare(strict_types=1);

namespace Tests\Feature\Reactions;

use App\Models\Article;
use App\Models\ArticleReaction;
use App\Models\Reaction;
use App\Models\User;
use Tests\TestCase;

final class ReactionStoreTest extends TestCase
{
    public function test_example(): void
    {
        $article = Article::factory()->create();
        $reaction = Reaction::factory()->create();
        ArticleReaction::factory([
            'article_id' => $article->id,
            'reaction_id' => $reaction->id,
        ])->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('reactions.store', $article->id))
            ->assertOk()
            ->assertJsonFragment([
                [
                    "text" => $reaction->text,
                    "updated_at" => $reaction->updated_at,
                    "created_at" => $reaction->created_at,
                ]
            ]);


    }
}
