<?php

namespace App\Services;

class CommandManager
{
    private NumberIteratorHelper $iteratorhelper;
    private NumberIterator $iterator;

    public function __construct(NumberIterator $iterator)
    {
        $this->iterator = $iterator;
        $this->iteratorhelper = new NumberIteratorHelper($iterator);
    }

    public function runFindCommand(): void
    {
        foreach ($this->iterator as $index => $value) {
            echo "Élément " . ($index + 1) . " : " . $value . "\n";
        }

        echo "Entrez un nombre à rechercher dans les données : ";
        $userInput = trim(fgets(STDIN));
        $numberToFind = intval($userInput);
        $found = $this->iteratorhelper->find($numberToFind);

        if ($found) {
            echo "Le nombre $numberToFind a été trouvé dans les données.\n";
        } else {
            echo "Le nombre $numberToFind n'a pas été trouvé dans les données.\n";
        }

        $readline = readline("Voulez-vous revenir un arrière ? ");
        if ($readline === "oui") {
            $this->iteratorhelper->previous();
            echo "Le nombre courant après previous : " . $this->iterator->current() . "\n";
        } else {
            exit;
        }
    }
}