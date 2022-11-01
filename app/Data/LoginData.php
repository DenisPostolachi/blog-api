<?php

declare(strict_types=1);

namespace App\Data;

final class LoginData
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
