<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\UI\LanguageSelector;

use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;
use Wavevision\PosobotaExamples\Presenters\AppPresenter;

class LanguageSelectorTest extends PresenterTestCase
{

	public function testHandleSelect(): void
	{
		$response = $this->extractRedirectResponse(
			$this->runPresenter(
				new PresenterRequest(
					AppPresenter::class,
					AppPresenter::DEFAULT_ACTION,
					[
						'locale' => 'cs',
						'do' => $this->createParam('select'),
						$this->createParam('iso') => 'en',
					]
				)
			)
		);
		$this->assertStringContainsString('locale=en', $response->getUrl());
	}

	private function createParam(string $param): string
	{
		return "header-languageSelector-$param";
	}

}
