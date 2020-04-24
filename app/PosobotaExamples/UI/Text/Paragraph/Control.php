<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Text\Paragraph;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\PropsControl;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends PropsControl
{

	protected function getPropsClass(): string
	{
		return ParagraphProps::class;
	}

}
