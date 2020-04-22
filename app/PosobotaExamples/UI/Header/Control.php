<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Header;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\NamespaceTranslator\TranslatedComponent;
use Wavevision\PosobotaExamples\UI\Header\Translations\Translation;
use Wavevision\PosobotaExamples\UI\LanguageSelector\LanguageSelectorComponent;
use Wavevision\PosobotaExamples\UI\Title\TitleComponent;
use Wavevision\PosobotaExamples\UI\Title\TitleProps;
use Wavevision\PropsControl\BaseControl;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends BaseControl
{

	use LanguageSelectorComponent;
	use TitleComponent;
	use TranslatedComponent;

	public function render(): void
	{
		$this
			->template
			->setParameters(
				[
					'title' => new TitleProps(
						[TitleProps::CONTENT => $this->translator->translate(Translation::CONTENT)]
					),
				]
			)->render();
	}

}
