<?php declare(strict_types = 1);

namespace Wavevision\PosobotaExamplesTests\Presenters;

use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;
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

}