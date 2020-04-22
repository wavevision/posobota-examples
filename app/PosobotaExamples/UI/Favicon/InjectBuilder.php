<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Favicon;

trait InjectBuilder
{

	protected Builder $builder;

	public function injectBuilder(Builder $builder): void
	{
		$this->builder = $builder;
	}

}
