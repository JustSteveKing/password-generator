<?php

declare(strict_types=1);

use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;
use JustSteveKing\PasswordGenerator\Contracts\ListContract;
use JustSteveKing\PasswordGenerator\Generators\PasswordGenerator;
use JustSteveKing\PasswordGenerator\Lists\AdjectiveList;
use JustSteveKing\PasswordGenerator\Lists\NounList;

it('can instantiate a new instance', function (string $word): void {
    expect(
        new PasswordGenerator(
            nouns: new NounList(
                words: [$word],
            ),
            adjectives: new AdjectiveList(
                words: [$word],
            ),
        ),
    )->toBeInstanceOf(GeneratorContract::class);
})->with('words');

it('can resolve a new instance', function (): void {
    expect(
        app()->make(
            abstract: GeneratorContract::class,
        )
    )->toBeInstanceOf(PasswordGenerator::class);
});

it('can create a noun list', function (string $word): void {
    expect(
        new NounList(
            words: [$word],
        ),
    )->toBeInstanceOf(ListContract::class);
})->with('words');

it('can get a random noun', function (string $word): void {
    expect(
        (new NounList(
            words: [$word],
        ))->random(),
    )->toBeString()->toEqual($word);
})->with('words');

it('can get a random secure noun', function (string $noun): void {
    expect(
        (new NounList(
            words: [$noun],
        ))->secure(),
    )->toBeString()->toEqual('41rp0rt');
})->with('nouns');

it('can create an adjective list', function (string $word): void {
    expect(
        new AdjectiveList(
            words: [$word],
        ),
    )->toBeInstanceOf(ListContract::class);
})->with('words');

it('can get a random adjective', function (string $word): void {
    expect(
        (new AdjectiveList(
            words: [$word],
        ))->random(),
    )->toBeString()->toEqual($word);
})->with('words');

it('can get a random secure adjective', function (string $adjective): void {
    expect(
        (new NounList(
            words: [$adjective],
        ))->secure(),
    )->toBeString()->toEqual('4d0r4bl3');
})->with('adjectives');

it('can generate a random password', function (string $noun): void {
    $generator = new PasswordGenerator(
        nouns: new NounList(
            words: [$noun],
        ),
        adjectives: new AdjectiveList(
            words: [$noun],
        ),
    );

    expect(
        $generator->generate(),
    )->toBeString()->toEqual("airport-airport-airport-airport");
})->with('nouns');

it('can generate a secure password', function (string $noun): void {
    $generator = new PasswordGenerator(
        nouns: new NounList(
            words: [$noun],
        ),
        adjectives: new AdjectiveList(
            words: [$noun],
        ),
    );

    expect(
        $generator->generateSecure(),
    )->toBeString()->toEqual("41rp0rt-41rp0rt-41rp0rt-41rp0rt");
})->with('nouns');
