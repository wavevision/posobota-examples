<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Text\Paragraph;

trait ParagraphComponent
{

	private ControlFactory $paragraphControlFactory;

	public function injectParagraphControlFactory(ControlFactory $controlFactory): void
	{
		$this->paragraphControlFactory = $controlFactory;
	}

	public function getParagraphComponent(): Control
	{
		return $this['paragraph'];
	}

	protected function createComponentParagraph(): Control
	{
		return $this->paragraphControlFactory->create();
	}

	protected function attachComponentParagraph(Control $component): void
	{
		$this->addComponent($component, 'paragraph');
	}

}
