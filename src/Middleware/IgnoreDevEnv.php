<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Middleware;

use Telebugs\BaseMiddleware;

class IgnoreDevEnv extends BaseMiddleware
{
  private string $environment;

  public function __construct($environment)
  {
    $this->environment = $environment;
  }

  public function __invoke($report): void
  {
    $report->ignored = !($this->environment === 'local' || $this->environment === 'testing');
  }
}
