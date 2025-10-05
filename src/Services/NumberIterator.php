<?php

namespace App\Services;

use Iterator;
use App\Entity\Data;

class NumberIterator implements Iterator
{
    private array $data;
    private int $position = 0;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->data[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->data[$this->position]);
    }

    /**
     * Recule d'un élément dans l'itérateur si possible.
     */
    public function previous(): void
    {
        if ($this->position > 0) {
            --$this->position;
        }
    }

    /**
     * Recule de plusieurs éléments dans l'itérateur si possible.
     */
    public function morePrevious(int $args): void
    {
        if ($this->position > 0) {
            $this->position -= $args;
            if ($this->position < 0) {
                $this->position = 0;
            }
        }
    }
}