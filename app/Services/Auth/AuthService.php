<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Data\RegisterData;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class AuthService
{
    public function registration(RegisterData $registerData): User
    {
        return User::create([
            'name' => $registerData->name,
            'email' => $registerData->email,
            'password' => Hash::make($registerData->password)]);
    }
}
