<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Middleware;

use Telebugs\BaseMiddleware;

use Telebugs\TelebugsLaravel\TelebugsLaravel;

class ReporterInfo extends BaseMiddleware
{
  private array $reporter;

  public function __construct($laravelVersion)
  {
    $this->reporter = [
      'library' => ['name' => 'telebugs-laravel', 'version' => TelebugsLaravel::VERSION],
      'platform' => ['name' => 'Laravel', 'version' => $laravelVersion],
    ];
  }

  public function __invoke($report): void
  {
    $report->data['reporters'][] = $this->reporter;
  }
}
