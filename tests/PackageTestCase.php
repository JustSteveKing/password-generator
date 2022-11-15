<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use JustSteveKing\PasswordGenerator\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    /**
     * @param Application $app
     * @return array<int,class-string<ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}
