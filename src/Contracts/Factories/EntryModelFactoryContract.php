<?php

namespace Fazed\NyaaRssClient\Contracts\Factories;

use Fazed\NyaaRssClient\Contracts\Models\EntryContract;

interface EntryModelFactoryContract
{
    /**
     * Make a new entry instance.
     *
     * @param  array $data
     * @return EntryContract
     */
    public function make(array $data): EntryContract;
}
