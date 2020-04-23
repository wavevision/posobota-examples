<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

trait InjectJokes
{

	protected Jokes $jokes;

	public function injectJokes(Jokes $jokes): void
	{
		$this->jokes = $jokes;
	}

}
