<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Attributes;

use Attribute;

/**
 * @immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final readonly class Repeat
{
    /**
     * @var non-empty-string
     */
    private string $methodName;

    /**
     * @var int
     */
    private int $count;

    /**
     * @param int $count
     */
    public function __construct(int $count = 1)
    {
        var_dump('Repeat is being used.');
        $this->methodName = 'repeatable';
        $this->count = $count;
    }

    /**
     * @return non-empty-string
     */
    public function methodName(): string
    {
        return $this->methodName;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }
}
