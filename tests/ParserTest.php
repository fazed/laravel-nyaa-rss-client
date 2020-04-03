<?php

namespace Fazed\NyaaRssClient\Test;

use Fazed\NyaaRssClient\Enums\NyaaFilters;
use Fazed\NyaaRssClient\Enums\NyaaCategories;
use Fazed\NyaaRssClient\Contracts\NyaaRssClientContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;

class ParserTest extends TestCase
{
    /** @test */
    public function it_can_fetch_feed()
    {
        /** @var NyaaRssClientContract $client */
        $client = app(NyaaRssClientContract::class);

        /** @var ResponseContract $response */
        $response = $client->get();

        $this->assertGreaterThan(0, $response->getEntryCount());
    }

    /** @test */
    public function it_can_fetch_feed_with_category()
    {
        /** @var NyaaRssClientContract $client */
        $client = app(NyaaRssClientContract::class);

        /** @var ResponseContract $response */
        $response = $client->getByCategory(NyaaCategories::ANIME_ENGLISH);

        $this->assertGreaterThan(0, $response->getEntryCount());
    }

    /** @test */
    public function it_can_fetch_feed_with_filter()
    {
        /** @var NyaaRssClientContract $client */
        $client = app(NyaaRssClientContract::class);

        /** @var ResponseContract $response */
        $response = $client->getByFilter(NyaaFilters::TRUSTED_ONLY);

        $this->assertGreaterThan(0, $response->getEntryCount());
    }

    /** @test */
    public function it_can_fetch_feed_with_category_and_filter()
    {
        /** @var NyaaRssClientContract $client */
        $client = app(NyaaRssClientContract::class);

        /** @var ResponseContract $response */
        $response = $client->getByCategoryAndFilter(
            NyaaCategories::ANIME_ENGLISH,
            NyaaFilters::TRUSTED_ONLY
        );

        $this->assertGreaterThan(0, $response->getEntryCount());
    }

    /** @test */
    public function it_can_fetch_feed_with_search_query()
    {
        /** @var NyaaRssClientContract $client */
        $client = app(NyaaRssClientContract::class);

        /** @var ResponseContract $response */
        $response = $client->getByCategoryAndFilter(
            NyaaCategories::ANIME_ENGLISH,
            NyaaFilters::TRUSTED_ONLY,
            ['q' => 'to']
        );

        $this->assertGreaterThan(0, $response->getEntryCount());
    }
}
