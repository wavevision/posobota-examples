<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\UI\Flag;

use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\LatteFilters\Mtime\InjectMtime;
use Wavevision\NetteWebpack\InjectFormatAssetName;
use Wavevision\NetteWebpack\InjectNetteWebpack;
use Wavevision\PosobotaExamples\UI\Sprites\Sprites;
use Wavevision\PropsControl\PropsControl;
use Wavevision\PropsControl\ValidProps;
use Wavevision\Utils\ContentTypes;

/**
 * @DIService(generateComponent=true)
 */
final class Control extends PropsControl
{

	use InjectFormatAssetName;
	use InjectMtime;
	use InjectNetteWebpack;

	public function getClassName(): string
	{
		return 'flag';
	}

	/**
	 * @inheritDoc
	 */
	public function getClassNameModifiers(): array
	{
		return [FlagProps::ISO => self::USE_VALUE];
	}

	protected function beforeRender(ValidProps $props): void
	{
		parent::beforeRender($props);
		$this->template->setParameters(['url' => $this->formatUrl()]);
	}

	protected function getPropsClass(): string
	{
		return FlagProps::class;
	}

	private function formatUrl(): string
	{
		$url = $this->formatAssetName->process(ContentTypes::getFilename(Sprites::FLAGS, ContentTypes::SVG));
		if ($this->netteWebpack->isProduction()) {
			return $this->mtime->process($url);
		}
		return $url;
	}

}
