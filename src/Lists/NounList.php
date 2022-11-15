<?php

declare(strict_types=1);

namespace JustSteveKing\PasswordGenerator\Lists;

use JustSteveKing\PasswordGenerator\Concerns\HasWords;
use JustSteveKing\PasswordGenerator\Contracts\ListContract;

final class NounList implements ListContract
{
    use HasWords;
}
