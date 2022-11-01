<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Data\RegisterData;
use App\Http\Requests\Auth\RegistrationRequest;

final class RegisterDataMapper
{
    public function mapFromRequestToNormalized(RegistrationRequest $request): RegisterData
    {
        return new RegisterData(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
    }
}
