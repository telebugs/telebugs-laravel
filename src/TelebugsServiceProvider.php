<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel;

use Illuminate\Support\ServiceProvider;
use Telebugs\Reporter;
use function Telebugs\configure;

use Telebugs\TelebugsLaravel\Middleware\ReporterInfo;
use Telebugs\TelebugsLaravel\Middleware\IgnoreDevelopmentErrors;

class TelebugsServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->publishes([
      __DIR__ . '/../config/telebugs.php' => base_path('config/telebugs.php'),
    ], 'config');
  }

  public function register()
  {
    $this->app->singleton(Reporter::class, function ($app) {
      $cfg = $app['config']['telebugs'];

      configure(function ($config) use ($cfg, $app) {
        $config->setApiKey($cfg['api_key']);
        $config->setRootDirectory($cfg['root_directory']);
        $config->setEnvironment($cfg['environment']);
        $config->setIgnoreEnvironments($cfg['ignore_environments']);
        $config->middleware()->use(new ReporterInfo($app->version()));
      });

      return Reporter::getInstance();
    });

    $path = realpath(__DIR__ . '/../config/telebugs.php');
    if ($path !== false) {
      $this->mergeConfigFrom($path, 'telebugs');
    } else {
      throw new \RuntimeException('Could not load Telebugs configuration file');
    }
    $this->app->alias(Reporter::class, 'telebugs');
  }
}
