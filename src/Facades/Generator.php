<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Facades;

use Illuminate\Support\Facades\Facade;
use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;

/**
 * @method static string generate()
 *
 * @see GeneratorContract
 */
final class Generator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GeneratorContract::class;
    }
}
