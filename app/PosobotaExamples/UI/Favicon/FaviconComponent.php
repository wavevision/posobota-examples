<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Favicon;

trait FaviconComponent
{

	private ControlFactory $faviconControlFactory;

	public function injectFaviconControlFactory(ControlFactory $controlFactory): void
	{
		$this->faviconControlFactory = $controlFactory;
	}

	public function getFaviconComponent(): Control
	{
		return $this['favicon'];
	}

	protected function createComponentFavicon(): Control
	{
		return $this->faviconControlFactory->create();
	}

	protected function attachComponentFavicon(Control $component): void
	{
		$this->addComponent($component, 'favicon');
	}

}
