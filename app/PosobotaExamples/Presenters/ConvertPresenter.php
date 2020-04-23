<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamples\Presenters;

use Wavevision\PosobotaExamples\Models\InjectConvertEURToCZK;

final class ConvertPresenter extends BasePresenter
{

	use InjectConvertEURToCZK;

	public function actionDefault(float $eur): void
	{
		$this->sendJson(
			[
				'eur' => $eur,
				'czk' => $this->convertEURToCZK->process($eur),
			]
		);
	}

}
