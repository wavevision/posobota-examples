<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples;

use Nette\Configurator;
use Nette\StaticClass;
use Wavevision\Utils\Path;

final class Bootstrap
{

	use StaticClass;

	public static function boot(): Configurator
	{
		$configurator = self::createConfigurator();
		//$configurator->setDebugMode(false);
		$configurator->enableTracy(self::rootDir()->string('log'));
		$configurator->addConfig(self::configDir()->string('local.neon'));
		return $configurator;
	}

	public static function createConfigurator(): Configurator
	{
		$configurator = new Configurator();
		$rootDir = self::rootDir();
		$configurator
			->setTimeZone('Europe/Prague')
			->setTempDirectory($rootDir->string('temp'))
			->addConfig(self::configDir()->string('common.neon'));
		return $configurator;
	}

	public static function rootDir(): Path
	{
		return Path::create(__DIR__, '..', '..');
	}

	public static function configDir(): Path
	{
		return self::appDir()->path('config');
	}

	public static function appDir(): Path
	{
		return self::rootDir()->path('app');
	}

}
