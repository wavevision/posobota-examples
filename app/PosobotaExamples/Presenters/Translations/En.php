<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters\Translations;

class En extends Translation
{

	/**
	 * @inheritDoc
	 */
	public static function define(): array
	{
		return [
			self::TITLE => 'Welcome!',
		];
	}

}
