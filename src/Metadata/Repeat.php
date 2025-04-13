<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Metadata;

use /**
 * @immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final readonly class Repeat extends Metadata
{
    /**
     * @var class-string
     */
    private string $className;

    /**
     * @var non-empty-string
     */
    private string $methodName;

    /**
     * @var int
     */
    private int $times;

    /**
     * @param int<0, 1> $level
     * @param class-string $className
     * @param int $times
     */
    protected function __construct(int $level, string $className, int $times)
    {
        parent::__construct($level);

        $this->className  = $className;
        $this->methodName = 'repeatable';
        $this->times      = $times;
    }

    public function isDataProvider(): true
    {
        return true;
    }

    /**
     * @return class-string
     */
    public function className(): string
    {
        return $this->className;
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
    public function times(): int
    {
        return $this->times;
    }
}
