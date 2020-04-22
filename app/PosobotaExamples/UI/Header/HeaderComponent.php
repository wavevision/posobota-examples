<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Header;

trait HeaderComponent
{

	private ControlFactory $headerControlFactory;

	public function injectHeaderControlFactory(ControlFactory $controlFactory): void
	{
		$this->headerControlFactory = $controlFactory;
	}

	public function getHeaderComponent(): Control
	{
		return $this['header'];
	}

	protected function createComponentHeader(): Control
	{
		return $this->headerControlFactory->create();
	}

	protected function attachComponentHeader(Control $component): void
	{
		$this->addComponent($component, 'header');
	}

}
