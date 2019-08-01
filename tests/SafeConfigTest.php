<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig\Test;

use function array_keys;
use function implode;
use Opositatest\PhpCsFixerConfig\SafeConfig;
use PHPUnit\Framework\TestCase;

final class SafeConfigTest extends TestCase
{
    public function testConfigContainsRules(): void
    {
        $this->assertNotEmpty((new SafeConfig())->getRules());
    }

    public function testRiskyRulesAreNotAccepted(): void
    {
        $this->assertFalse((new SafeConfig())->getRiskyAllowed());
    }

    public function testConfigDoesNotContainRiskyRules(): void
    {
        $this->assertNotRegExp(
            '/\:risky/',
            implode(' ', array_keys((new SafeConfig())->getRules()))
        );
    }
}
