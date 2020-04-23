<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Models;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PosobotaExamples\Models\CurrencyRateFeed;

/**
 * @DIService(generateInject=true, name="currencyRateFeed")
 */
class CurrencyRateFeedMock extends CurrencyRateFeed
{

	private array $mock;

	public function setMock(array $mock): void
	{
		$this->mock = $mock;
	}

	public function get(): array
	{
		return $this->mock;
	}

}