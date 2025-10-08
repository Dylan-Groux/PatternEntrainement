<?php

namespace App\Services\Strategy;

class SearchStrategyHelper
{
    public function find(SearchStrategyInterface $strategy, array $data, int $number): int|false
    {
        return $strategy->search($data, $number);
    }
}