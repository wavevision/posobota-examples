<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

trait InjectFilteredJokes
{

	protected FilteredJokes $filteredJokes;

	public function injectFilteredJokes(FilteredJokes $filteredJokes): void
	{
		$this->filteredJokes = $filteredJokes;
	}

}
