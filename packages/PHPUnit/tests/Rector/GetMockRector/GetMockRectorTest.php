<?php

declare(strict_types=1);

namespace Rector\PHPUnit\Tests\Rector\GetMockRector;

use Iterator;
use Rector\PHPUnit\Rector\GetMockRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class GetMockRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideDataForTest()
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    public function provideDataForTest(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return GetMockRector::class;
    }
}
