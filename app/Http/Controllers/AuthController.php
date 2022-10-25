<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegistrationResource;
use App\Repositories\Auth\AuthRepository;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService,
        private AuthRepository $authRepository,
    )
    {
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        $user = $this->authService->registration($request);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(new RegistrationResource($token), Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = $this->authRepository->getFirstOrFailByEmail($request->email);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(new LoginResource($token), Response::HTTP_CREATED);
    }
}
