<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig\Test;

use Opositatest\PhpCsFixerConfig\OpositatestConfig;
use PHPUnit\Framework\TestCase;

final class OpositatestConfigTest extends TestCase
{
    public function testConfigContainsRules(): void
    {
        $this->assertNotEmpty((new OpositatestConfig())->getRules());
    }

    public function testRiskyRulesAreNotAccepted(): void
    {
        $this->assertFalse((new OpositatestConfig())->getRiskyAllowed());
    }

    public function testConfigDoesNotContainRiskyRules(): void
    {
        $this->assertDoesNotMatchRegularExpression(
            '/\:risky/',
            \implode(' ', \array_keys((new OpositatestConfig())->getRules()))
        );
    }
}
