<?php

namespace Fazed\NyaaRssClient\Factories;

use Fazed\NyaaRssClient\Contracts\Factories\EntryModelFactoryContract;
use Fazed\NyaaRssClient\Contracts\Models\EntryContract;

class EntryModelFactory implements EntryModelFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(array $data): EntryContract
    {
        return app(EntryContract::class)->setAttribute($data);
    }
}
