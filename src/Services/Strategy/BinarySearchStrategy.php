<?php

namespace App\Services\Strategy;

class BinarySearchStrategy implements SearchStrategyInterface
{
    /**
     * Recherche binaire sur un ensemble de donnée trié.
     * Retourne l'index si trouvé, false sinon.
     */
    public function search(array $data, int $number): int|false
    {
        $left = 0;
        $right = count($data) - 1;

        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($data[$mid] === $number) {
                return $mid;
            } elseif ($data[$mid] < $number) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return false;
    }
}