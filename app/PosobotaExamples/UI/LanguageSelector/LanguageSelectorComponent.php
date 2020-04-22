<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\LanguageSelector;

trait LanguageSelectorComponent
{

	private ControlFactory $languageSelectorControlFactory;

	public function injectLanguageSelectorControlFactory(ControlFactory $controlFactory): void
	{
		$this->languageSelectorControlFactory = $controlFactory;
	}

	public function getLanguageSelectorComponent(): Control
	{
		return $this['languageSelector'];
	}

	protected function createComponentLanguageSelector(): Control
	{
		return $this->languageSelectorControlFactory->create();
	}

	protected function attachComponentLanguageSelector(Control $component): void
	{
		$this->addComponent($component, 'languageSelector');
	}

}
