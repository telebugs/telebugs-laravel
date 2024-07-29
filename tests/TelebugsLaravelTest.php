<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use PHPUnit\Framework\TestCase;

class TelebugsLaravelTest extends TestCase
{
  public function testVersion(): void
  {
    $this->assertSame('0.1.0', \Telebugs\TelebugsLaravel\TelebugsLaravel::VERSION);
  }
}
