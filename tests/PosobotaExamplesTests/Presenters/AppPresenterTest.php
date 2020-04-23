<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Presenters;

use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\Runners\SubmitFormRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;
use Wavevision\PosobotaExamples\Components\SearchForm\Factory;
use Wavevision\PosobotaExamples\Presenters\AppPresenter;

class AppPresenterTest extends PresenterTestCase
{

	public function testDefaultCs(): void
	{
		$this->assertStringContainsString(
			'Vítejte!',
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(AppPresenter::class, 'default', ['locale' => 'cs']))
			)
		);
	}

	public function testDefaultEn(): void
	{
		$this->assertStringContainsString(
			'Welcome!',
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(AppPresenter::class, 'default', ['locale' => 'en']))
			)
		);
	}

	public function testSearch(): void
	{
		$responseContent = $this->extractTextResponseContent(
			$this->runPresenter(
				new PresenterRequest(AppPresenter::class, 'default', ['locale' => 'cs', Factory::KEYWORD => 'loop'])
			)
		);
		$this->assertStringContainsString('Searching for loop', $responseContent);
		$this->assertStringContainsString('Chuck Norris went out of an infinite loop.', $responseContent);
	}

	public function testSubmitSearch(): void
	{
		$formResponse = $this->submitForm(
			new SubmitFormRequest(
				'searchForm-form',
				AppPresenter::class,
				'default',
				['locale' => 'cs'],
				[Factory::KEYWORD => '42']
			)
		);
		$this->assertValidForm($formResponse);
		$redirectResponseUrl = $this->extractRedirectResponseUrl($formResponse->getPresenterResponse());
		$this->assertStringContainsString('keyword=42', $redirectResponseUrl);
	}

}
