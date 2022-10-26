<?php

declare(strict_types=1);

namespace App\Http\Resources\Articles;

use Illuminate\Http\Resources\Json\JsonResource;

final class ArticleResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            "title" => $request['title'],
            "text" => $request['text'],
        ];
    }
}
