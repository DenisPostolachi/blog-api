<?php

declare(strict_types=1);

namespace App\Http\Requests\Reactions;

use App\enums\Reactions;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;

/**
 * @property string $text
 */
final class ReactionRequest extends BaseRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'text' => [new Enum(Reactions::class)],
        ];
    }
}
