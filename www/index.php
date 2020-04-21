<?php declare(strict_types = 1);

use Nette\Application\Application;
use Wavevision\PosobotaExamples\Bootstrap;

require __DIR__ . '/../vendor/autoload.php';
Bootstrap::boot()
	->createContainer()
	->getByType(Application::class)
	->run();
