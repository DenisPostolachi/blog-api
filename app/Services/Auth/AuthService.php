<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use App\Repositories\Auth\AuthRepository;


final class AuthService
{
    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    public function registration(RegistrationRequest $request)
    {
        return $this->authRepository->getFirstOrFailByEmail($request);
    }

    public function login(LoginRequest $request): User
    {
        return User::where('email', $request['email'])->firstOrFail();
    }
}
