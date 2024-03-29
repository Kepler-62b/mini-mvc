<?php

declare(strict_types=1);

namespace App;

use Framework\Kernel;

require dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

return new Kernel(include __DIR__ . '/../config/services.php');