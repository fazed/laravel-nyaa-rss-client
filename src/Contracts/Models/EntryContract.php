<?php

namespace Fazed\NyaaRssClient\Contracts\Models;

interface EntryContract
{
    /**
     * Get one or more attributes.
     *
     * @param  string|array $key
     * @return null|mixed
     */
    public function getAttribute($key);

    /**
     * Set one or more attributes.
     *
     * @param  string|array $key
     * @param  null|mixed $value
     * @return $this
     */
    public function setAttribute($key, $value = null): EntryContract;
}
