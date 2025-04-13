<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Repeat;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('Repeat')]
#[Small]
final class RepeatTest extends TestCase
{
    #[Repeat(5), DataProvider('repeatable')]
    public function testRepeatsTest(): void
    {
        $this->assertTrue(true);
    }

    public static function repeatable(): array
    {
        return [
            0 => [],
            1 => [],
            2 => [],
            3 => []
        ];
    }
}
