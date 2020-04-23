<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Models;

trait InjectConvertEURToCZK
{

	protected ConvertEURToCZK $convertEURToCZK;

	public function injectConvertEURToCZK(ConvertEURToCZK $convertEURToCZK): void
	{
		$this->convertEURToCZK = $convertEURToCZK;
	}

}
