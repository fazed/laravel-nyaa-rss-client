<?php

namespace Fazed\NyaaRssClient\Models;

use ArrayAccess;
use Fazed\NyaaRssClient\Contracts\Models\EntryContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use JsonSerializable;

class Entry implements EntryContract, ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    /**
     * @var array
     */
    private $attributes;

    /**
     * Entry constructor.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @inheritDoc
     */
    public function getAttribute($key)
    {
        return is_array($key)
            ? Arr::only($this->attributes, $key)
            : $this->attributes[$key] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($key, $value = null): EntryContract
    {
        if (is_array($key)) {
            $this->attributes = array_merge($key, $this->attributes);
        } else {
            $this->attributes[$key] = $value;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * @inheritDoc
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->attributes[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }
}
