<?php

namespace Fazed\NyaaRssClient\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use Fazed\NyaaRssClient\NyaaRssClientProvider;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set(
            'nyaa-rss-client',
            require __DIR__ . '/../resources/config/nyaa-rss-client.php'
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [NyaaRssClientProvider::class];
    }
}
