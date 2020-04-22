<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
use Wavevision\NetteWebpack\InjectResolveEntryChunks;
use Wavevision\NetteWebpack\UI\Components\Assets\AssetsComponent;
use Wavevision\PosobotaExamples\Language\InjectLocaleManager;
use Wavevision\PosobotaExamples\UI\Favicon\FaviconComponent;
use Wavevision\PosobotaExamples\Webpack\Entries;
use Wavevision\PropsControl\Helpers\ClassName;

/**
 * @property Template $template
 */
abstract class BasePresenter extends Presenter
{

	use AssetsComponent;
	use FaviconComponent;
	use InjectLocaleManager;
	use InjectResolveEntryChunks;

	/**
	 * @persistent
	 */
	public ?string $locale = null;

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
					'documentClassName' => new ClassName('document'),
					'locale' => $this->localeManager->current(),
				]
			);
	}

}
