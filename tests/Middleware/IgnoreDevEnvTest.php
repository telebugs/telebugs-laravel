<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use PHPUnit\Framework\TestCase;
use Telebugs\TelebugsLaravel\Middleware\IgnoreDevEnv;
use Telebugs\Report;

class IgnoreDevEnvTest extends TestCase
{
  public function testIgnoreDevEnvIgnoresLocalEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevEnv("local");
    $middleware($report);

    $this->assertTrue($report->ignored);
  }

  public function testIgnoreDevEnvIgnoresTestingEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevEnv("testing");
    $middleware($report);

    $this->assertTrue($report->ignored);
  }

  public function testIgnoreDevEnvDoesNotIgnoreProductionEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevEnv("production");
    $middleware($report);

    $this->assertFalse($report->ignored);
  }

  public function testIgnoreDevEnvDoesNotIgnoreStagingEnvironment(): void
  {
    $report = $this->createMock(Report::class);

    $middleware = new IgnoreDevEnv("staging");
    $middleware($report);

    $this->assertFalse($report->ignored);
  }

  public function testWeight(): void
  {
    $middleware = new IgnoreDevEnv("local");

    $this->assertSame(-1000, $middleware->getWeight());
  }
}
