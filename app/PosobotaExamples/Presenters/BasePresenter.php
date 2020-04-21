<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
use Wavevision\NamespaceTranslator\TranslatedComponent;
use Wavevision\NetteWebpack\InjectResolveEntryChunks;
use Wavevision\NetteWebpack\UI\Components\Assets\AssetsComponent;
use Wavevision\PosobotaExamples\Presenters\Translations\Translation;
use Wavevision\PosobotaExamples\Webpack\Entries;

/**
 * @property Template $template
 */
abstract class BasePresenter extends Presenter
{

	use AssetsComponent;
	use InjectResolveEntryChunks;
	use TranslatedComponent;

	protected function beforeRender(): void
	{
		parent::beforeRender();
		$this
			->getAssetsComponent()
			->setChunks($this->resolveEntryChunks->process(Entries::INDEX));
		$this
			->template
			->setParameters(
				[
					'locale' => $this->translator->getTranslator()->getLocale(),
					'title' => $this->translator->translate(Translation::TITLE),
				]
			);
	}

}
