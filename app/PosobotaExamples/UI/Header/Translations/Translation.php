<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Header\Translations;

use Nette\StaticClass;

abstract class Translation implements \Wavevision\NamespaceTranslator\Resources\Translation
{

	use StaticClass;

	public const CONTENT = 'Vítejte!';

}
