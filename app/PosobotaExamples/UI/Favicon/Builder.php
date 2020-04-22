<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Favicon;

use Nette\SmartObject;
use Nette\Utils\Html;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\NetteWebpack\InjectFormatAssetName;
use Wavevision\Utils\ContentTypes;

/**
 * @DIService(generateInject=true)
 */
class Builder
{

	use SmartObject;
	use InjectFormatAssetName;

	private const TYPE = ContentTypes::PNG;

	/**
	 * @return Html[]
	 */
	public function build(): array
	{
		return [
			$this->buildHtml(16),
			$this->buildHtml(32),
		];
	}

	private function buildHtml(int $size): Html
	{
		$sizes = $this->buildSizes($size);
		return Html::el('link')->addAttributes(
			[
				'href' => $this->buildHref("favicon-$sizes"),
				'rel' => 'icon',
				'sizes' => $sizes,
				'type' => self::TYPE,
			]
		);
	}

	private function buildHref(string $name): string
	{
		return $this->formatAssetName->process(ContentTypes::getFilename($name, self::TYPE));
	}

	private function buildSizes(int $size): string
	{
		return implode('x', [$size, $size]);
	}

}
