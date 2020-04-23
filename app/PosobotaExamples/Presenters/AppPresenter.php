<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Bridges\ApplicationLatte\Template;
use Wavevision\PosobotaExamples\Components\SearchForm\SearchFormComponent;
use Wavevision\PosobotaExamples\Models\InjectFilteredJokes;
use Wavevision\PosobotaExamples\UI\Header\HeaderComponent;

/**
 * @property Template $template
 */
final class AppPresenter extends BasePresenter
{

	use HeaderComponent;
	use SearchFormComponent;
	use InjectFilteredJokes;

	public function actionDefault(?string $keyword): void
	{
		$this->template->search = sprintf('Searching for %s', $keyword);
		$this->template->jokes = $this->filteredJokes->get($keyword);
	}

}
