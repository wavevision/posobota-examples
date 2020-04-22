<?php declare(strict_types = 1);

use Wavevision\NetteTests\Configuration;
use Wavevision\PosobotaExamplesTests\Bootstrap;

$autoload = require __DIR__ . '/../vendor/autoload.php';
Configuration::setup([Bootstrap::class, 'boot']);
