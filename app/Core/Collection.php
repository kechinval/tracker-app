<?php

namespace App\Core;

use Traversable;

class Collection implements \ArrayAccess, \Countable, \IteratorAggregate
{
    public function __construct(protected array $items)
    {

    }

    public static function make(array $items): Collection
    {
        return new static($items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}