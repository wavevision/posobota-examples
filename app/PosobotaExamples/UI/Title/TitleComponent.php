<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Title;

trait TitleComponent
{

	private ControlFactory $titleControlFactory;

	public function injectTitleControlFactory(ControlFactory $controlFactory): void
	{
		$this->titleControlFactory = $controlFactory;
	}

	public function getTitleComponent(): Control
	{
		return $this['title'];
	}

	protected function createComponentTitle(): Control
	{
		return $this->titleControlFactory->create();
	}

	protected function attachComponentTitle(Control $component): void
	{
		$this->addComponent($component, 'title');
	}

}
