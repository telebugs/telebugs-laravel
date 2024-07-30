<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Tests;

use Illuminate\Support\ServiceProvider;
use Telebugs\Reporter;
use Telebugs\Config;

use Telebugs\TelebugsLaravel\TelebugsServiceProvider;

class TelebugsServiceProviderTest extends AbstractTestCase
{
  public function testServiceProviderRegisters()
  {
    $serviceProvider = $this->app->getProvider(TelebugsServiceProvider::class);
    $this->assertInstanceOf(ServiceProvider::class, $serviceProvider);
  }

  public function testServiceProviderBoots()
  {
    $this->assertTrue($this->app->bound('telebugs'));
  }

  public function testReporterInfoMiddlewareIsAttached()
  {
    $this->assertInstanceOf(Reporter::class, $this->app['telebugs']);
    $this->assertEquals(4, count(Config::getInstance()->middleware()->getMiddlewares()));
  }
}
