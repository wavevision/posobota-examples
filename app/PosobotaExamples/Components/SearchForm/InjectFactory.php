<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Components\SearchForm;

trait InjectFactory
{

	protected Factory $factory;

	public function injectFactory(Factory $factory): void
	{
		$this->factory = $factory;
	}

}
