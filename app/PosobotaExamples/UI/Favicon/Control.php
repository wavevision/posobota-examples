<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Favicon;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\BaseControl;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends BaseControl
{

	use InjectBuilder;

	public function render(): void
	{
		$this
			->template
			->setParameters(['builder' => $this->builder])
			->render();
	}

}
