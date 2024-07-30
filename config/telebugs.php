<?php

declare(strict_types=1);

return [
  'api_key' => env('TELEBUGS_API_KEY', ''),
  'root_directory' => base_path(),
  'environment' => env('APP_ENV', 'local'),
  'ignore_environments' => ['local', 'testing'],
];
