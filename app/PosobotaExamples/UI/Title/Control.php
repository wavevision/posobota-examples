<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Title;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\PropsControl;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends PropsControl
{

	public function getClassName(): string
	{
		return 'title';
	}

	protected function getPropsClass(): string
	{
		return TitleProps::CONTENT;
	}

}
