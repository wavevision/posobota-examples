<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\LanguageSelector;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PosobotaExamples\Language\InjectLocaleManager;
use Wavevision\PosobotaExamples\Presenters\BasePresenter;
use Wavevision\PosobotaExamples\UI\Flag\FlagComponent;
use Wavevision\PropsControl\BaseControl;
use Wavevision\PropsControl\Helpers\ClassName;

/**
 * @DIService(generateComponent=true)
 * @property BasePresenter $presenter
 */
final class Control extends BaseControl
{

	use FlagComponent;
	use InjectLocaleManager;

	public function handleSelect(string $iso): void
	{
		$this->presenter->locale = $iso;
		$this->presenter->redirect('this');
	}

	public function render(): void
	{
		$this
			->template
			->setParameters(
				[
					'available' => $this->localeManager->available(),
					'className' => new ClassName('language-selector'),
					'current' => $this->localeManager->current(),
				]
			)->render();
	}

}
