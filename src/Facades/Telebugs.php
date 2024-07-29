<?php

declare(strict_types=1);

namespace Telebugs\TelebugsLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \GuzzleHttp\Promise\PromiseInterface report(\Throwable $e)
 */
class Telebugs extends Facade
{
  public static function getFacadeAccessor(): string
  {
    return 'telebugs';
  }
}
