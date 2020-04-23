<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests;

use Nette\Configurator;
use Wavevision\PosobotaExamples\Bootstrap as AppBootstrap;
use Wavevision\Utils\Path;

final class Bootstrap
{

	public static function boot(): Configurator
	{
		$rootDir = self::rootDir();
		$configurator = AppBootstrap::createConfigurator();
		$configurator->addConfig(self::servicesConfig());
		$configurator->addParameters(
			[
				'tempDir' => $rootDir->string('temp'),
				'wwwDir' => $rootDir->string('www'),
			]
		);
		return $configurator;
	}

	public static function rootDir(): Path
	{
		return Path::create(__DIR__, '..', '..');
	}

	public static function testsDir(): Path
	{
		return self::rootDir()->path('tests');
	}

	public static function servicesConfig(): string
	{
		return self::testsDir()->string('config', 'services.neon');
	}

}
