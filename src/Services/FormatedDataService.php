<?php

namespace App\Services;

class FormatedDataService
{
    /**
     * Trie un tableau selon un comparateur donné.
     *
     * @param array $data Le tableau à trier.
     * @param callable|null $comparator Le comparateur à utiliser (optionnel).
     * @return array Le tableau trié.
     */
    public function sortArray(array $data, callable $comparator = null): array {
        if ($comparator) {
            usort($data, $comparator);
        } else {
            // Tri par défaut (ascendant pour int/string)
            usort($data, fn($a, $b) => $a <=> $b);
        }
        return $data;
    }
}