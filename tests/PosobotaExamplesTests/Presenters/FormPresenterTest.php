<?php declare(strict_types = 1);

namespace PosobotaExamplesTests\Presenters;

use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\Runners\SubmitFormRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;
use Wavevision\PosobotaExamples\Presenters\FormPresenter;

class FormPresenterTest extends PresenterTestCase
{

	public function testRender(): void
	{
		$this->assertStringContainsString(
			'submit',
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(FormPresenter::class, 'default', ['locale' => 'cs']))
			)
		);
	}

	public function testSubmitValid(): void
	{
		$this->assertValidForm(
			$this->submitForm(
				new SubmitFormRequest(
					'helloForm',
					FormPresenter::class,
					'default',
					['locale' => 'cs'],
					[FormPresenter::HELLO => 'hello']
				)
			)
		);
	}

}