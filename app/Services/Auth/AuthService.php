<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Support\Facades\Hash;


final class AuthService
{
    public function registration(RegistrationRequest $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)]);
    }
}
