<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Text;

use Nette\Schema\Schema;
use Wavevision\PropsControl\Helpers\PropTypes;
use Wavevision\PropsControl\Props;

class TextProps extends Props
{

	public const CONTENT = 'content';

	/**
	 * @return Schema[]
	 */
	protected function define(): array
	{
		return [
			self::CONTENT => PropTypes::pureRenderable(),
		];
	}

}
