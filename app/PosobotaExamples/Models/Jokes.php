<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

use Nette\SmartObject;
use Nette\Utils\FileSystem;
use Nette\Utils\Json;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class Jokes
{

	use SmartObject;

	/**
	 * @return array<mixed>
	 */
	public function get(): array
	{
		return Json::decode(FileSystem::read(__DIR__ . '/jokes.json'), Json::FORCE_ARRAY);
	}

}
