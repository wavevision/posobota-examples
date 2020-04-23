<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

use Nette\Utils\FileSystem;
use Nette\Utils\Json;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true, name="currencyRateFeed", params={"%currencyRateFeed%"})
 */
class CurrencyRateFeed
{

	private string $url;

	public function __construct(string $url)
	{
		$this->url = $url;
	}

	/**
	 * @return array<mixed>
	 */
	public function get(): array
	{
		return Json::decode(FileSystem::read($this->url), Json::FORCE_ARRAY);
	}

}
