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
        return $this->build(
            $this->nouns->random(),
            $this->adjectives->random(),
            $this->nouns->random(),
            $this->adjectives->random(),
        );
    }

    public function generateSecure(): string
    {
        return $this->build(
            $this->nouns->secure(),
            $this->adjectives->secure(),
            $this->nouns->secure(),
            $this->adjectives->secure(),
        );
    }

    private function build(string ...$parts): string
    {
        return implode('-', $parts);
    }
}
