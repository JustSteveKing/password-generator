<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;
use JustSteveKing\PasswordGenerator\Generators\PasswordGenerator;
use JustSteveKing\PasswordGenerator\Lists\AdjectiveList;
use JustSteveKing\PasswordGenerator\Lists\NounList;

final class PackageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: GeneratorContract::class,
            concrete: fn (): GeneratorContract => new PasswordGenerator(
                nouns: new NounList(
                    words: (array) config('password-generator.nouns'),
                ),
                adjectives: new AdjectiveList(
                    words: (array) config('password-generator.adjectives'),
                ),
            ),
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                paths: [
                    __DIR__ . '/../../config/password-generator.php',
                    config_path('password-generator.php'),
                ],
                groups: 'password-generator-config',
            );
        }
    }
}
