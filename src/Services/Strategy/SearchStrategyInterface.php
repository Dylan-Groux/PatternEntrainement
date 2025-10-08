<?php

namespace App\Services\Strategy;

interface SearchStrategyInterface
{
    public function search(array $data, int $number): int|false;
}
