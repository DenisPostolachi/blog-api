<?php

declare(strict_types=1);

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

final class LoginResource extends JsonResource
{
    public function __construct(private string $token)
    {
        parent::__construct($token);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => 'Bearer',
        ];
    }
}
