<?php

namespace Diglactic\Breadcrumbs\Tests;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\ServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Spatie\Snapshots\MatchesSnapshots;

abstract class TestCase extends TestbenchTestCase
{
    use MatchesSnapshots;

    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return ['Breadcrumbs' => Breadcrumbs::class];
    }

    protected function resolveApplicationConfiguration($app): void
    {
        parent::resolveApplicationConfiguration($app);

        $app->config->set('view.paths', [__DIR__ . '/resources/views']);
        $app->config->set('breadcrumbs.view', 'breadcrumbs');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }
}
