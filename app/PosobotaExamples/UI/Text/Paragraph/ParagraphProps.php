<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Text\Paragraph;

use Nette\Schema\Expect;
use Nette\Schema\Schema;
use Wavevision\PropsControl\Props;

class ParagraphProps extends Props
{

	public const CONTENT = 'content';

	/**
	 * @return Schema[]
	 */
	protected function define(): array
	{
		return [
			self::CONTENT => Expect::string()->default(''),
		];
	}

}
