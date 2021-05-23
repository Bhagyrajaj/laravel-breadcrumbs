<?php

namespace Diglactic\Breadcrumbs\Tests;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\ServiceProvider;

class CustomChildServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [CustomChildServiceProvider::class];
    }

    public function testRender()
    {
        $html = Breadcrumbs::render('home')->toHtml();

        $this->assertXmlStringEqualsXmlString('
            <ol>
                <li class="current">Home</li>
            </ol>
        ', $html);
    }
}

class CustomChildServiceProvider extends ServiceProvider
{
    public function registerBreadcrumbs(): void
    {
        Breadcrumbs::for('home', function ($trail) {
            $trail->push('Home', '/');
        });
    }
}
