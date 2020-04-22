<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Nette\Application\UI\Form;

final class FormPresenter extends BasePresenter
{

	public const HELLO = 'hello';

	public function actionDefault(?string $hello): void
	{
		$this->template->hello = $hello;
	}

	public function createComponentHelloForm(): Form
	{
		$form = new Form();
		$form->addText(self::HELLO)
			->setRequired();
		$form->addSubmit('submit');
		$form->onSuccess[] = function (Form $form): void {
			$this->redirect('default', [self::HELLO => $form->getValues()[self::HELLO]]);
		};
		return $form;
	}

}
