<?php

declare(strict_types=1);

namespace App\Repositories\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class AuthRepository
{
    public function getFirstOrFailByEmail(LoginRequest $request): User
    {
        return User::where('email', $request['email'])->firstOrFail();
    }
}
