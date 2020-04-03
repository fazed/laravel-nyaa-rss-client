<?php

namespace Fazed\NyaaRssClient\HttpClient;

use Fazed\NyaaRssClient\Contracts\Factories\ResponseFactoryContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ClientContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Exceptions\InvalidResponseException;
use Httpful\Mime;
use Httpful\Request;
use Illuminate\Support\Facades\Config;

class Client implements ClientContract
{
    /**
     * @var ResponseFactoryContract
     */
    protected $responseFactory;

    /**
     * Client constructor.
     *
     * @param ResponseFactoryContract $responseFactory
     */
    public function __construct(ResponseFactoryContract $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @inheritDoc
     */
    public function dispatchRequest(array $queries = []): ResponseContract
    {
        try {
            return $this->responseFactory->make(
                Request::getQuick(
                    $this->prepareDispatchUrl($queries),
                    Mime::XML
                )->body
            );
        } catch (\Exception $e) {
            throw new InvalidResponseException("An error occurred while fetching data: {$e->getMessage()}");
        }
    }

    /**
     * Prepare a dispatchable URL, combining data
     * from the configuration and given queries.
     *
     * @param  array $queries
     * @return string
     */
    protected function prepareDispatchUrl(array $queries): string
    {
        $queries = array_filter(
            array_merge(
                Config::get('nyaa-rss-client.base_queries', []),
                $queries
            )
        );

        $queries = http_build_query($queries, null, '&', PHP_QUERY_RFC1738);

        return Config::get('nyaa-rss-client.base_url', '') . ($queries ? "?{$queries}" : '');
    }
}
