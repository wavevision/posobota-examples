<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Language;

use Contributte\Translation\Translator;

trait InjectTranslator
{

	protected Translator $translator;

	public function injectTranslator(Translator $translator): void
	{
		$this->translator = $translator;
	}

}
