<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig\Test;

use Opositatest\PhpCsFixerConfig\StrictConfig;
use PHPUnit\Framework\TestCase;

final class StrictConfigTest extends TestCase
{
    public function testConfigContainsRules(): void
    {
        $this->assertNotEmpty((new StrictConfig())->getRules());
    }

    public function testRiskyRulesAreAccepted(): void
    {
        $this->assertTrue((new StrictConfig())->getRiskyAllowed());
    }
}
