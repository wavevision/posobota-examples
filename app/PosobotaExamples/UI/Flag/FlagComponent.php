<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Flag;

trait FlagComponent
{

	private ControlFactory $flagControlFactory;

	public function injectFlagControlFactory(ControlFactory $controlFactory): void
	{
		$this->flagControlFactory = $controlFactory;
	}

	public function getFlagComponent(): Control
	{
		return $this['flag'];
	}

	protected function createComponentFlag(): Control
	{
		return $this->flagControlFactory->create();
	}

	protected function attachComponentFlag(Control $component): void
	{
		$this->addComponent($component, 'flag');
	}

}
