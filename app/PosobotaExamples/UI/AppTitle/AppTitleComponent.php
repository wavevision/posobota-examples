<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\AppTitle;

trait AppTitleComponent
{

	private ControlFactory $appTitleControlFactory;

	public function injectAppTitleControlFactory(ControlFactory $controlFactory): void
	{
		$this->appTitleControlFactory = $controlFactory;
	}

	public function getAppTitleComponent(): Control
	{
		return $this['appTitle'];
	}

	protected function createComponentAppTitle(): Control
	{
		return $this->appTitleControlFactory->create();
	}

	protected function attachComponentAppTitle(Control $component): void
	{
		$this->addComponent($component, 'appTitle');
	}

}
