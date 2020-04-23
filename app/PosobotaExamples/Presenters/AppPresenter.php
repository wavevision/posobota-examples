<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Bridges\ApplicationLatte\Template;
use Wavevision\NamespaceTranslator\TranslatedComponent;
use Wavevision\PosobotaExamples\Components\SearchForm\SearchFormComponent;
use Wavevision\PosobotaExamples\Models\InjectFilteredJokes;
use Wavevision\PosobotaExamples\UI\Header\HeaderComponent;

/**
 * @property Template $template
 */
final class AppPresenter extends BasePresenter
{

	use HeaderComponent;
	use InjectFilteredJokes;
	use SearchFormComponent;
	use TranslatedComponent;

	public function actionDefault(?string $keyword): void
	{
		$this
			->template
			->setParameters(
				[
					'jokes' => $this->filteredJokes->get($keyword),
					'keyword' => $keyword,
				]
			);
	}

}
