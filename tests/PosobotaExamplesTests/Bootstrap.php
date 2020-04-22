<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests;

use Nette\Configurator;
use Wavevision\PosobotaExamples\Bootstrap as AppBootstrap;
use Wavevision\Utils\Path;

final class Bootstrap
{

	public static function boot(): Configurator
	{
		$rootDir = Path::create(__DIR__, '..', '..');
		$configurator = AppBootstrap::createConfigurator();
		$configurator->addParameters(
			[
				'tempDir' => $rootDir->string('temp'),
				'wwwDir' => $rootDir->string('www'),
			]
		);
		return $configurator;
	}

}