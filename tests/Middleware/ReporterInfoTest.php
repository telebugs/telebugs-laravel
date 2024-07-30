<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use PHPUnit\Framework\TestCase;
use Telebugs\TelebugsLaravel\Middleware\ReporterInfo;
use Telebugs\Report;

class ReporterInfoTest extends TestCase
{
  public function testReporterInfoAddsReporterInfo(): void
  {
    $laravelVersion = "1.2.3";
    $report = $this->createMock(Report::class);

    $middleware = new ReporterInfo($laravelVersion);
    $middleware($report);

    $laravelReporter = $report->data["reporters"][0];

    $this->assertSame("telebugs-laravel", $laravelReporter["library"]["name"]);
    $this->assertSame(
      \Telebugs\TelebugsLaravel\TelebugsLaravel::VERSION,
      $laravelReporter["library"]["version"]
    );
    $this->assertSame("Laravel", $laravelReporter["platform"]["name"]);
    $this->assertSame($laravelVersion, $laravelReporter["platform"]["version"]);
  }
}
