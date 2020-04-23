<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Components\SearchForm;

use Nette\Application\UI\Form;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class Factory
{

	public const SEARCH = 'search';

	public const KEYWORD = 'keyword';

	use SmartObject;

	public function create(): Form
	{
		$form = new Form();
		$form->addText(self::KEYWORD);
		$form->addSubmit(self::SEARCH);
		return $form;
	}

}
