<?php 

namespace App\Entity;

class Data
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function add(mixed $value): void
    {
        $this->data[] = $value;
    }

    public function removeAt(int $index): void
    {
        if (isset($this->data[$index])) {
            array_splice($this->data, $index, 1);
        }
    }

    public function get(int $index): mixed
    {
        return $this->data[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->data);
    }
}