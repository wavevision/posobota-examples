<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Components\SearchForm;

trait SearchFormComponent
{

	private ControlFactory $searchFormControlFactory;

	public function injectSearchFormControlFactory(ControlFactory $controlFactory): void
	{
		$this->searchFormControlFactory = $controlFactory;
	}

	protected function createComponentSearchForm(): Control
	{
		return $this->searchFormControlFactory->create();
	}

}
