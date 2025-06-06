<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\Output\Default;

use PHPUnit\Event\Facade;
use PHPUnit\Event\Test\PrintedUnexpectedOutput;
use PHPUnit\Event\Test\PrintedUnexpectedOutputSubscriber;
use PHPUnit\TextUI\Output\Printer;

final readonly class UnexpectedOutputPrinter implements PrintedUnexpectedOutputSubscriber
{
    private Printer $printer;

    public function __construct(Printer $printer, Facade $facade)
    {
        $this->printer = $printer;

        $facade->registerSubscriber($this);
    }

    public function notify(PrintedUnexpectedOutput $event): void
    {
        $this->printer->print($event->output());
    }
}
