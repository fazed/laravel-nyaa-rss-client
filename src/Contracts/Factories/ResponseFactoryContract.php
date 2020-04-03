<?php

namespace Fazed\NyaaRssClient\Contracts\Factories;

use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Exceptions\NamespaceNotFoundException;
use SimpleXMLElement;

interface ResponseFactoryContract
{
    /**
     * Make a new ResponseContract instance
     * from the provided response body.
     *
     * @param  null|SimpleXMLElement|object $responseData
     * @return ResponseContract
     * @throws NamespaceNotFoundException
     */
    public function make($responseData): ResponseContract;
}
