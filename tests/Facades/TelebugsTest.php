<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use PHPUnit\Framework\TestCase;

use Telebugs\TelebugsLaravel\Facades\Telebugs as TelebugsFacade;

class TelebugsTest extends TestCase
{
  public function testFacadeResolvesAnInstance(): void
  {
    $this->assertEquals('telebugs', TelebugsFacade::getFacadeAccessor());
  }
}
