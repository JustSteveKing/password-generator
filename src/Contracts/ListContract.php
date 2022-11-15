<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Contracts;

interface ListContract
{
    public function random(): string;

    public function secure(): string;
}
