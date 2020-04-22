<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Flag;

use Nette\Schema\Expect;
use Wavevision\PropsControl\Props;

class FlagProps extends Props
{

	public const ISO = 'iso';

	/**
	 * @inheritDoc
	 */
	protected function define(): array
	{
		return [
			self::ISO => Expect::string()->required(),
		];
	}

}
