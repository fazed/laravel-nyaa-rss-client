<?php

namespace Fazed\NyaaRssClient\Contracts\HttpClient;

use Fazed\NyaaRssClient\Contracts\Models\EntryContract;

interface ResponseContract
{
    /**
     * Get all entries on the instance.
     *
     * @return EntryContract[]
     */
    public function getEntries(): array;

    /**
     * Set the entries on the instance.
     *
     * @param  EntryContract[] $entries
     * @return $this
     */
    public function setEntries(array $entries): ResponseContract;

    /**
     * Get the number of entries on the instance.
     *
     * @return int
     */
    public function getEntryCount(): int;
}
