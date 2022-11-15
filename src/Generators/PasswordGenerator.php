<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Generators;

use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;
use JustSteveKing\PasswordGenerator\Contracts\ListContract;

final class PasswordGenerator implements GeneratorContract
{
    public function __construct(
        private readonly ListContract $nouns,
        private readonly ListContract $adjectives,
    ) {
    }

    public function generate(): string
    {
        $password = "{$this->nouns->random()}-{$this->adjectives->random()}";
        $password .= "-{$this->nouns->random()}-{$this->adjectives->random()}";

        return $password;
    }

    public function generateSecure(): string
    {
        $password = "{$this->nouns->secure()}-{$this->adjectives->secure()}";
        $password .= "-{$this->nouns->secure()}-{$this->adjectives->secure()}";

        return $password;
    }
}
