<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use PHPUnit\Framework\TestCase;
use Telebugs\TelebugsLaravel\Middleware\IgnoreDevelopmentErrors;
use Telebugs\Report;

class IgnoreDevelopmentErrorsTest extends TestCase
{
  public function testIgnoreDevelopmentErrorsIgnoresLocalEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevelopmentErrors("local");
    $middleware($report);

    $this->assertTrue($report->ignored);
  }

  public function testIgnoreDevelopmentErrorsIgnoresTestingEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevelopmentErrors("testing");
    $middleware($report);

    $this->assertTrue($report->ignored);
  }

  public function testIgnoreDevelopmentErrorsDoesNotIgnoreProductionEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevelopmentErrors("production");
    $middleware($report);

    $this->assertFalse($report->ignored);
  }

  public function testIgnoreDevelopmentErrorsDoesNotIgnoreStagingEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevelopmentErrors("staging");
    $middleware($report);

    $this->assertFalse($report->ignored);
  }

  public function testWeight(): void
  {
    $middleware = new IgnoreDevelopmentErrors("local");

    $this->assertSame(-1000, $middleware->getWeight());
  }
}
