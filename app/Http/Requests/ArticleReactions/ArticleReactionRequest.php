<?php

declare(strict_types=1);

namespace App\Http\Requests\ArticleReactions;

use App\Http\Requests\BaseRequest;

/**
 * @property int $reaction_id
 */
final class ArticleReactionRequest extends BaseRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'reaction_id' => ['required', 'integer']
        ];
    }
}
