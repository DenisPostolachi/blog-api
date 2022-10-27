<?php

declare(strict_types=1);

namespace App\Http\Resources\Articles;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

final class ArticleResource extends JsonResource
{
    public function __construct(private Article $article)
    {
        parent::__construct($article);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->article->title,
            "text" => $this->article->text,
        ];
    }
}
