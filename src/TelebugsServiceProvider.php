<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel;

use Illuminate\Support\ServiceProvider;
use Telebugs\Reporter;
use function Telebugs\configure;

use Telebugs\TelebugsLaravel\Middleware\ReporterInfo;
use Telebugs\TelebugsLaravel\Middleware\IgnoreDevEnv;

class TelebugsServiceProvider extends ServiceProvider
{
  public function boot()
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
        $config->middleware()->use(new ReporterInfo($app->version()));
        $config->middleware()->use(new IgnoreDevEnv($app->environment()));
      });

      return new Reporter();
    });

    $this->mergeConfigFrom(realpath(__DIR__ . '/../config/telebugs.php'), 'telebugs');
    $this->app->alias(Reporter::class, 'telebugs');
  }
}
