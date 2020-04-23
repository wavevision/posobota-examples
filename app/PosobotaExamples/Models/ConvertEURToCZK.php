<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class ConvertEURToCZK
{

	use SmartObject;
	use InjectCurrencyRateFeed;

	public function process(float $eur): float
	{
		return $this->currencyRateFeed->get()['czk']['rate'] * $eur;
	}

}
