<?php declare(strict_types = 1);

namespace Tests\Cases\E2E\Latte;

use App\Bootstrap;
use App\UI\Home\HomePresenter;
use Contributte\Tester\Toolkit;
use Nette\Application\Request;
use Nette\Http\RequestFactory;
use Nette\Http\Response;
use Tester\Assert;

require_once __DIR__ . '/../../../bootstrap.php';

Toolkit::test(function (): void {
	$container = Bootstrap::boot()->createContainer();

	$presenter = $container->getByName($container->findByType(HomePresenter::class)[0]);
	assert($presenter instanceof HomePresenter);

	ob_start();
	$response = $presenter->run(new Request('Home', 'default'));
	$response->send((new RequestFactory())->fromGlobals(), new Response());
	$content = ob_get_clean();
	Assert::match('%A%Hello!%A%', $content);
});
