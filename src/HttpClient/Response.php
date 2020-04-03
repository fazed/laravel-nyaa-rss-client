<?php

namespace Fazed\NyaaRssClient\HttpClient;

use Fazed\NyaaRssClient\Contracts\HttpClient\ResponseContract;
use Fazed\NyaaRssClient\Contracts\Models\EntryContract;

class Response implements ResponseContract
{
    /**
     * @var EntryContract[]
     */
    private $entries;

    /**
     * Response constructor.
     *
     * @param EntryContract[] $entries
     */
    public function __construct(array $entries = [])
    {
        $this->entries = $entries;
    }

    /**
     * @inheritDoc
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @inheritDoc
     */
    public function setEntries(array $entries): ResponseContract
    {
        $this->entries = $entries;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEntryCount(): int
    {
        return count($this->entries);
    }
}
