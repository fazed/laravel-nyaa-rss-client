<?php

namespace Fazed\NyaaRssClient\Contracts;

use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Exceptions\InvalidResponseException;

interface NyaaRssClientContract
{
    /**
     * Get a fresh copy of the RSS feed.
     *
     * @param  array $params
     * @return ResponseContract
     * @throws InvalidResponseException
     */
    public function get(array $params = []): ResponseContract;

    /**
     * Get a fresh copy of the RSS feed by category.
     *
     * @param  string $category
     * @param  array $params
     * @return ResponseContract
     * @throws InvalidResponseException
     */
    public function getByCategory(string $category, array $params = []): ResponseContract;

    /**
     * Get a fresh copy of the RSS feed by filter.
     *
     * @param  string $filter
     * @param  array $params
     * @return ResponseContract
     * @throws InvalidResponseException
     */
    public function getByFilter(string $filter, array $params = []): ResponseContract;

    /**
     * Get a fresh copy of the RSS feed by category and filter.
     *
     * @param  string $category
     * @param  string $filter
     * @param  array $params
     * @return ResponseContract
     * @throws InvalidResponseException
     */
    public function getByCategoryAndFilter(string $category, string $filter, array $params = []): ResponseContract;
}
