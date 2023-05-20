<?php

date_default_timezone_set('Asia/Tehran');
ini_set("log_errors", 1);
ini_set("error_log", "logs/php-error.log");
ini_set("memory_limit", "-1");

require __DIR__ . '/vendor/System/Application.php';
require __DIR__ . '/vendor/System/File.php';

use System\File;
use System\Application;

$file = new File(__DIR__);

$app = Application::getInstance($file);

$app->run();
