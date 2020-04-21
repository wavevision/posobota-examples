<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters\Translations;

use Nette\StaticClass;

abstract class Translation implements \Wavevision\NamespaceTranslator\Resources\Translation
{

	use StaticClass;

	public const TITLE = 'title';

}
