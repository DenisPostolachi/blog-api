<?php

declare(strict_types=1);

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;

/**
 * @property string $text
 * @property int $article_id
 * @property int $author_id
 */

final class CommentRequest extends BaseRequest
{
    public function rules(): array
    {
        /**
         * @return string[][]
         */
        return [
            'text' => ['required', 'string', 'min:4', 'max:255'],
        ];
    }
}
