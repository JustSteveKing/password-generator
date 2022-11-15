<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Lists;

use JustSteveKing\PasswordGenerator\Concerns\HasWords;
use JustSteveKing\PasswordGenerator\Contracts\ListContract;

final class AdjectiveList implements ListContract
{
    use HasWords;
}
