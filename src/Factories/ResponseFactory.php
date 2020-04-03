<?php

namespace Fazed\NyaaRssClient\Factories;

use Fazed\NyaaRssClient\Contracts\Factories\EntryModelFactoryContract;
use Fazed\NyaaRssClient\Contracts\Factories\ResponseFactoryContract;
use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Exceptions\NamespaceNotFoundException;

class ResponseFactory implements ResponseFactoryContract
{
    /**
     * @var EntryModelFactoryContract
     */
    protected $entryModelFactory;

    /**
     * ResponseFactory constructor.
     *
     * @param EntryModelFactoryContract $entryModelFactory
     */
    public function __construct(EntryModelFactoryContract $entryModelFactory)
    {
        $this->entryModelFactory = $entryModelFactory;
    }

    /**
     * @inheritDoc
     */
    public function make($responseData): ResponseContract
    {
        $response = app(ResponseContract::class);

        if (null === $responseData) {
            return $response;
        }

        if ( ! array_key_exists('nyaa', $namespaces = $responseData->getDocNamespaces())) {
            throw new NamespaceNotFoundException('Could not find namespace "nyaa"');
        }

        $entries = array_map(function (\SimpleXMLElement $entry) use ($namespaces) {
            return $this->entryModelFactory->make(
                array_map(static function ($value) {
                    return (string) $value;
                }, array_merge((array) $entry->children(), (array) $entry->children($namespaces['nyaa'])))
            );
        }, $responseData->xpath('channel/item'));

        return $response->setEntries($entries);
    }
}
