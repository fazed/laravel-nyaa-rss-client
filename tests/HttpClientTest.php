<?php

namespace Fazed\NyaaRssClient\Test;

use Fazed\NyaaRssClient\Enums\NyaaFilters;
use Fazed\NyaaRssClient\Enums\NyaaCategories;
use Fazed\NyaaRssClient\Contracts\HttpClient\ClientContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;

final class HttpClientTest extends TestCase
{
    /**
     * @var ClientContract
     */
    private $httpClient;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->httpClient = app(ClientContract::class);
    }

    /** @test */
    public function it_can_resolve_feed()
    {
        /** @var ResponseContract $response */
        $response = $this->httpClient->dispatchRequest();

        $this->assertGreaterThan(0, $response->getEntryCount());
    }

    /** @test */
    public function it_can_resolve_feed_with_query()
    {
        /** @var ResponseContract $response */
        $response = $this->httpClient->dispatchRequest([
            'c' => NyaaCategories::ANIME_ENGLISH,
            'f' => NyaaFilters::TRUSTED_ONLY,
        ]);

        $this->assertGreaterThan(0, $response->getEntryCount());
    }
}
