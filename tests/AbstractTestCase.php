<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use Telebugs\TelebugsLaravel\TelebugsServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
  /**
   * Get the service provider class.
   *
   * @param \Illuminate\Contracts\Foundation\Application $app
   *
   * @return array<string>
   */
  protected function getPackageProviders($app): array
  {
    return [
      TelebugsServiceProvider::class,
    ];
  }
}
