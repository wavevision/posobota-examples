<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Language;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PosobotaExamples\Presenters\BasePresenter;

/**
 * @DIService(generateInject=true)
 */
class LocaleManager
{

	use SmartObject;
	use InjectTranslator;

	/**
	 * @return string[]
	 */
	public function available(): array
	{
		return $this->translator->getLocalesWhitelist() ?? [];
	}

	public function change(BasePresenter $presenter, string $iso): void
	{
		$this->translator->setLocale($iso);
		$presenter->locale = $this->current();
		$presenter->redirect('this');
	}

	public function current(): string
	{
		return $this->translator->getLocale();
	}

}
