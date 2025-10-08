<?php

namespace App\Services\Strategy;

class LinearSearchStrategy implements SearchStrategyInterface
{
    /**
     * Recherche linéaire sur un ensemble de donnée non trié.
     * Retourne l'index si trouvé, false sinon.
     */
    public function search(array $data, int $number) : int|false 
    {
        foreach($data as $index => $value) {
            if ($value === $number) {
                return $index;
            }
        }
        return false;
    }
}