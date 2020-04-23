<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Presenters;

use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;
use Wavevision\PosobotaExamples\Presenters\ConvertPresenter;
use Wavevision\PosobotaExamplesTests\Models\InjectCurrencyRateFeedMock;

class ConvertPresenterTest extends PresenterTestCase
{

	use InjectCurrencyRateFeedMock;

	public function testDefault(): void
	{
		$this->currencyRateFeedMock->setMock(['czk' => ['rate' => 25]]);
		$this->assertEquals(
			[
				"eur" => 2.0,
				"czk" => 50.0,
			],
			$this->extractJsonResponsePayload(
				$this->runPresenter(new PresenterRequest(ConvertPresenter::class, 'default', ['eur' => 2]))
			)
		);
	}

}