<?php declare (strict_types = 1);

namespace Wavevision\PosobotaExamples\Router;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\Routing\Router;
use Nette\StaticClass;

final class RouterFactory
{

	use StaticClass;

	public static function createRouter(): Router
	{
		$router = new RouteList();
		$router[] = new Route(
			'<presenter>/<action>[/<id>]',
			[
				'presenter' => 'App',
				'action' => 'default',
			]
		);
		return $router;
	}

}
