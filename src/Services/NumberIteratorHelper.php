<?php

namespace App\Services;

class NumberIteratorHelper
{
    private NumberIterator $iterator;

    public function __construct(NumberIterator $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * Recherche un nombre dans l'itérateur et positionne le curseur dessus si trouvé.
     * Retourne true si trouvé, false sinon.
     */
    public function find(int $number): bool
    {
        $this->iterator->rewind();
        while ($this->iterator->valid()) {
            if ($this->iterator->current() === $number) {
                return true;
            }
            $this->iterator->next();
        }
        return false;
    }

    /**
     * Recule d'un élément dans l'itérateur si possible.
     */
    public function previous(): void
    {
        if (method_exists($this->iterator, 'previous')) {
            $this->iterator->previous();
        }
    }
}