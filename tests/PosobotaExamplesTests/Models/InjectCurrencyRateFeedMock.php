<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Models;

trait InjectCurrencyRateFeedMock
{

	protected CurrencyRateFeedMock $currencyRateFeedMock;

	public function injectCurrencyRateFeedMock(CurrencyRateFeedMock $currencyRateFeedMock): void
	{
		$this->currencyRateFeedMock = $currencyRateFeedMock;
	}

}
