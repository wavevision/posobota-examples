<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Bridges\ApplicationLatte\Template;
use Wavevision\NamespaceTranslator\TranslatedComponent;
use Wavevision\PosobotaExamples\Components\SearchForm\SearchFormComponent;
use Wavevision\PosobotaExamples\Models\InjectFilteredJokes;
use Wavevision\PosobotaExamples\UI\Header\HeaderComponent;
use Wavevision\PosobotaExamples\UI\Text\Paragraph\ParagraphComponent;
use Wavevision\PosobotaExamples\UI\Text\Paragraph\ParagraphProps;
use Wavevision\PosobotaExamples\UI\Text\TextComponent;
use Wavevision\PosobotaExamples\UI\Text\TextProps;

/**
 * @property Template $template
 */
final class AppPresenter extends BasePresenter
{

	use HeaderComponent;
	use InjectFilteredJokes;
	use ParagraphComponent;
	use SearchFormComponent;
	use TextComponent;
	use TranslatedComponent;

	public function actionDefault(?string $keyword): void
	{
		$this
			->template
			->setParameters(
				[
					'jokes' => $this->filteredJokes->get($keyword),
					'keyword' => $keyword,
					'text' => [
						TextProps::CONTENT => $this->getParagraphComponent()->renderToHtml(
							[ParagraphProps::CONTENT => $this->translator->translate('hello')]
						),
					],
				]
			);
	}

}
