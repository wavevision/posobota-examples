<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Models;

use Wavevision\NetteTests\TestCases\DIContainerTestCase;
use Wavevision\PosobotaExamples\Models\InjectFilteredJokes;

class FilteredJokesDITest extends DIContainerTestCase
{

	use InjectFilteredJokes;

	public function test(): void
	{
		$this->assertEquals(['Chuck Norris went out of an infinite loop.'], $this->filteredJokes->get('loop'));
	}

}
