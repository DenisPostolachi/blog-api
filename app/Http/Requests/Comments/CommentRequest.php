<?php

declare(strict_types=1);

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;

/**
 * @property string $text
 */

final class CommentRequest extends BaseRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'min:4', 'max:255'],
        ];
    }
}
