<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\Utils\Arrays;
use Wavevision\Utils\Strings;

/**
 * @DIService(generateInject=true)
 */
class FilteredJokes
{

	use SmartObject;
	use InjectJokes;

	/**
	 * @return array<mixed>
	 */
	public function get(?string $keyword): array
	{
		$jokes = $this->jokes->get();
		if ($keyword === null) {
			return $jokes;
		}
		return Arrays::filter($jokes, fn(string $joke) => Strings::contains($joke, $keyword, true));
	}

}
