<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Models;

use PHPUnit\Framework\TestCase;
use Wavevision\PosobotaExamples\Models\FilteredJokes;
use Wavevision\PosobotaExamples\Models\Jokes;

class FilteredJokesUnitTest extends TestCase
{

	public function test(): void
	{
		$filteredJokes = new FilteredJokes();
		$jokes = $this->createMock(Jokes::class);
		$jokes->expects($this->once())->method('get')->willReturn(['a', 'b', 'ab', 'c']);
		$filteredJokes->injectJokes($jokes);
		$this->assertEquals(['a', 'ab'], $filteredJokes->get('a'));
	}

}