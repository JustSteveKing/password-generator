<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Facades;

use Illuminate\Support\Facades\Facade;
use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;

/**
 * @method static string generate()
 * @method static string generateSecure()
 *
 * @see GeneratorContract
 */
final class Generator extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return GeneratorContract::class;
    }
}
