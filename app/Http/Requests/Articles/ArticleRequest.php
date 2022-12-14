<?php

declare(strict_types=1);

namespace App\Http\Requests\Articles;

use App\Http\Requests\BaseRequest;

/**
 * @property string $title
 * @property string $text
 * @property string $start_date
 * @property string $end_date
 */
final class ArticleRequest extends BaseRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'text' => ['required', 'string', 'min:4', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
        ];
    }
}
