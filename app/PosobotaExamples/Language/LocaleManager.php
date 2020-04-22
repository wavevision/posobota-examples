<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Language;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

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

	public function current(): string
	{
		return $this->translator->getLocale();
	}

}
