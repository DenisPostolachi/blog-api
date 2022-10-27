<?php

declare(strict_types=1);

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository
{
    public function getFirstOrFailByEmail(string $mail): User
    {
        return User::where('email', $mail)->firstOrFail();
    }
}
