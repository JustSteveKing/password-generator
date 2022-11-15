<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Concerns;

trait HasWords
{
    /**
     * @param array $words
     */
    public function __construct(
        private readonly array $words,
    ) {
    }

    public function random(): string
    {
        return $this->words[array_rand($this->words)];
    }

    public function secure(): string
    {
        $word = $this->random();

        $asArray = str_split($word);

        $secureArray = array_map(
            callback: fn (string $item): string => $this->convertToNumerical($item),
            array: $asArray,
        );

        return implode('', $secureArray);
    }

    public function convertToNumerical(string $item): string
    {
        return match ($item) {
            'a' => '4',
            'e' => '3',
            'i' => '1',
            'o' => '0',
            default => $item,
        };
    }
}
