<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Title;

use Wavevision\PropsControl\Helpers\PropTypes;
use Wavevision\PropsControl\Props;

class TitleProps extends Props
{

	public const CONTENT = 'content';

	/**
	 * @inheritDoc
	 */
	protected function define(): array
	{
		return [
			self::CONTENT => PropTypes::pureRenderable(),
		];
	}

}
