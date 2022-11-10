<?php

declare(strict_types=1);

namespace Tests\Feature\Reactions;

use App\Models\Article;
use App\Models\ArticleReaction;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;

final class ReactionShowTest extends TestCase
{
    use HasFactory;

    public function test_will_show_article_reactions_successfully(): void
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
            ->getJson(route('reactions.index', $article->id))
            ->assertOk()
            ->assertJsonFragment([
                [
                    'text' => $reaction->text,
                    'created_at' => $reaction->created_at,
                    'updated_at' => $reaction->updated_at,
                ],
            ])
        ;
    }
}
