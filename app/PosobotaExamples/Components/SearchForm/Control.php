<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Components\SearchForm;

use Nette\Application\UI\Form;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\BaseControl;

/**
 * @DIService(generateComponent=true)
 */
class Control extends BaseControl
{

	use InjectFactory;

	public function render(): void
	{
		$this->template->render();
	}

	protected function createComponentForm(): Form
	{
		$form = $this->factory->create();
		$form->setDefaults([Factory::KEYWORD => $this->presenter->getParameter(Factory::KEYWORD)]);
		$form->onSuccess[] = function (Form $form): void {
			$this->presenter->redirect('this', [Factory::KEYWORD => $form->getValues()[Factory::KEYWORD]]);
		};
		return $form;
	}

}
