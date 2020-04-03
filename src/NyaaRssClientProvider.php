<?php

namespace Fazed\NyaaRssClient;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NyaaRssClientProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/nyaa-rss-client.php' => config_path('nyaa-rss-client.php'),
        ], 'config');
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->app->singleton(
            \Fazed\NyaaRssClient\Contracts\NyaaRssClientContract::class,
            \Fazed\NyaaRssClient\NyaaRssClient::class
        );

        $this->app->singleton(
            \Fazed\NyaaRssClient\Contracts\HttpClient\ClientContract::class,
            \Fazed\NyaaRssClient\HttpClient\Client::class
        );

        $this->app->singleton(
            \Fazed\NyaaRssClient\Contracts\Factories\ResponseFactoryContract::class,
            \Fazed\NyaaRssClient\Factories\ResponseFactory::class
        );

        $this->app->singleton(
            \Fazed\NyaaRssClient\Contracts\Factories\EntryModelFactoryContract::class,
            \Fazed\NyaaRssClient\Factories\EntryModelFactory::class
        );

        $this->app->bind(
            \Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract::class,
            \Fazed\NyaaRssClient\HttpClient\Response::class
        );

        $this->app->bind(
            \Fazed\NyaaRssClient\Contracts\Models\EntryContract::class,
            \Fazed\NyaaRssClient\Models\Entry::class
        );
    }

    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            \Fazed\NyaaRssClient\Contracts\NyaaRssClientContract::class,
            \Fazed\NyaaRssClient\Contracts\HttpClient\ClientContract::class,
            \Fazed\NyaaRssClient\Contracts\Factories\ResponseFactoryContract::class,
            \Fazed\NyaaRssClient\Contracts\Factories\EntryModelFactoryContract::class,
            \Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract::class,
            \Fazed\NyaaRssClient\Contracts\Models\EntryContract::class,
        ];
    }
}
