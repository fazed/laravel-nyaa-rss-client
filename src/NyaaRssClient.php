<?php

namespace Fazed\NyaaRssClient;

use Fazed\NyaaRssClient\Contracts\HttpClient\ClientContract as HttpClientContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Contracts\NyaaRssClientContract;

class NyaaRssClient implements NyaaRssClientContract
{
    /**
     * @var HttpClientContract
     */
    protected $httpClient;

    /**
     * NyaaRssClient constructor.
     *
     * @param HttpClientContract $httpClient
     */
    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @inheritDoc
     */
    public function get(array $params = []): ResponseContract
    {
        return $this->httpClient->dispatchRequest($params);
    }

    /**
     * @inheritDoc
     */
    public function getByCategory(string $category, array $params = []): ResponseContract
    {
        return $this->httpClient->dispatchRequest(array_merge($params, ['c' => $category]));
    }

    /**
     * @inheritDoc
     */
    public function getByFilter(string $filter, array $params = []): ResponseContract
    {
        return $this->httpClient->dispatchRequest(array_merge($params, ['f' => $filter]));
    }

    /**
     * @inheritDoc
     */
    public function getByCategoryAndFilter(string $category, string $filter, array $params = []): ResponseContract
    {
        return $this->httpClient->dispatchRequest(array_merge($params, ['c' => $category, 'f' => $filter]));
    }
}
