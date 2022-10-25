<?php

declare(strict_types=1);

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    private string $token;

    public function __construct(string $token)
    {
        parent::__construct($token);

        $this->token = $token;
    }

    public function toArray($request): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => 'Bearer',
        ];
    }
}
