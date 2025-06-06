<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use PHPUnit\Event\AbstractEventTestCase;
use PHPUnit\Event\Code;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(PreConditionCalled::class)]
#[Small]
final class PreConditionCalledTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = $this->telemetryInfo();
        $test          = $this->testValueObject();
        $calledMethod  = $this->calledMethod();

        $event = new PreConditionCalled(
            $telemetryInfo,
            $test,
            $calledMethod,
        );

        $this->assertSame($telemetryInfo, $event->telemetryInfo());
        $this->assertSame($test, $event->test());
        $this->assertSame('FooTest', $event->testClassName());
        $this->assertSame($calledMethod, $event->calledMethod());
    }

    public function testCanBeRepresentedAsString(): void
    {
        $event = new PreConditionCalled(
            $this->telemetryInfo(),
            $this->testValueObject(),
            $this->calledMethod(),
        );

        $this->assertSame('Pre Condition Method Called (HookClass::hookMethod)', $event->asString());
    }

    private function calledMethod(): Code\ClassMethod
    {
        return new Code\ClassMethod('HookClass', 'hookMethod');
    }
}
