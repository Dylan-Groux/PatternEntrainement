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
        while (true) {
            echo "\n--- Menu Iterator ---\n";
            echo "1. Afficher tous les éléments\n";
            echo "2. Chercher un nombre\n";
            echo "3. Revenir en arrière (previous)\n";
            echo "4. Ajouter une valeur\n";
            echo "5. Quitter\n";
            $choice = readline("Votre choix : ");

            switch ($choice) {
                case '1':
                    foreach ($this->iterator as $index => $value) {
                        echo "Élément " . ($index + 1) . " : " . $value . "\n";
                    }
                    break;
                case '2':
                    $numberToFind = intval(readline("Entrez un nombre à rechercher : "));
                    $found = $this->iteratorhelper->find($numberToFind);
                    if ($found) {
                        echo "Le nombre $numberToFind a été trouvé. Position courante : " . $this->iterator->key() . "\n";
                    } else {
                        echo "Le nombre $numberToFind n'a pas été trouvé.\n";
                    }
                    break;
                case '3':
                    $userInput = readline("Combien de positions reculer ? (par défaut 1) : ");
                    if (is_numeric($userInput) && intval($userInput) > 1) {
                        $this->iterator->morePrevious(intval($userInput));
                        echo "Position après morePrevious de $userInput : " . $this->iterator->key() . ", valeur : " . $this->iterator->current() . "\n";
                    } else {
                        $this->iteratorhelper->previous();
                        echo "Position après previous : " . $this->iterator->key() . ", valeur : " . $this->iterator->current() . "\n";
                    }
                    break;
                case '4':
                    $value = intval(readline("Valeur à ajouter : "));
                    // Attention : il faut ajouter la valeur à la collection d'origine (ex: Data)
                    // Ici, il faudrait passer la Data à CommandManager ou la manipuler autrement
                    echo "Ajout non implémenté (à faire selon ta structure Data)\n";
                    break;
                case '5':
                    echo "Au revoir !\n";
                    exit;
                default:
                    echo "Choix invalide.\n";
            }
        }
    }
}