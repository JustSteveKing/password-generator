<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Contracts;

interface GeneratorContract
{
    /**
     * @return string
     */
    public function generate(): string;

    /**
     * @return string
     */
    public function generateSecure(): string;
}
