<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

trait InjectCurrencyRateFeed
{

	protected CurrencyRateFeed $currencyRateFeed;

	public function injectCurrencyRateFeed(CurrencyRateFeed $currencyRateFeed): void
	{
		$this->currencyRateFeed = $currencyRateFeed;
	}

}
