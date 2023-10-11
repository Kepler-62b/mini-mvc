<?php

declare(strict_types=1);

namespace App;

use Dev\Tests\TestServices;
use Framework\Kernel;

require __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

//$test = new TestServices();
//$test->testApp();

return new Kernel();
