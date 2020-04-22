<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Language;

trait InjectLocaleManager
{

	protected LocaleManager $localeManager;

	public function injectLocaleManager(LocaleManager $localeManager): void
	{
		$this->localeManager = $localeManager;
	}

}
