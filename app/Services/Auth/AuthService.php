<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class AuthService
{
    public function registration(RegistrationRequest $request): User
    {
        dd($request);
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function login(LoginRequest $request): User
    {
        return User::where('email', $request['email'])->firstOrFail();
    }
}
