<?php

declare(strict_types=1);

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function getFirstOrFailByEmail($request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
