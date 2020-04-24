<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Text;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\PropsControl;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends PropsControl
{

	protected function getPropsClass(): string
	{
		return TextProps::class;
	}

}
