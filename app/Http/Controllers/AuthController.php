<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Mappers\LoginDataMapper;
use App\Http\Mappers\RegisterDataMapper;
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
        private LoginDataMapper $loginDataMapper,
        private RegisterDataMapper $registerDataMapper
    )
    {}

    public function register(RegistrationRequest $request): JsonResponse
    {
        $registerData = $this->registerDataMapper->mapFromRequestToNormalized($request);
        $user = $this->authService->registration($registerData);
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

        $loginData = $this->loginDataMapper->mapFromRequestToNormalized($request);
        $user = $this->authRepository->getFirstOrFailByEmail($loginData->email);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(new LoginResource($token), Response::HTTP_CREATED);
    }
}
