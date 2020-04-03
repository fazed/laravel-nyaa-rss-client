<?php

namespace Fazed\NyaaRssClient\Contracts\HttpClient;

use Fazed\NyaaRssClient\Exceptions\InvalidResponseException;

interface ClientContract
{
    /**
     * Dispatch an HTTP request with the given queries.
     *
     * @param  array $queries
     * @return ResponseContract
     * @throws InvalidResponseException
     */
    public function dispatchRequest(array $queries = []): ResponseContract;
}
