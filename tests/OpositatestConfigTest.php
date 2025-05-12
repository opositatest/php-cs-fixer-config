<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig\Test;

use Opositatest\PhpCsFixerConfig\OpositatestConfig;
use PHPUnit\Framework\TestCase;

final class OpositatestConfigTest extends TestCase
{
    private OpositatestConfig $config;

    protected function setUp(): void
    {
        $this->config = new OpositatestConfig();
    }

    public function testConfigContainsRules(): void
    {
        $this->assertNotEmpty($this->config->getRules());
    }

    public function testRiskyRulesAreNotAccepted(): void
    {
        $this->assertFalse($this->config->getRiskyAllowed());
    }

    public function testConfigDoesNotContainRiskyRules(): void
    {
        $this->assertDoesNotMatchRegularExpression(
            '/\:risky/',
            \implode(' ', \array_keys($this->config->getRules()))
        );
    }
}
