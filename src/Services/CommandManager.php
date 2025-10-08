<?php

namespace App\Services;

use App\Entity\Data;
use App\Services\Strategy\BinarySearchStrategy;
use App\Services\Strategy\LinearSearchStrategy;
use App\Services\Strategy\SearchStrategyInterface;
use App\Services\FormatedDataService;

class CommandManager
{
    private NumberIteratorHelper $iteratorhelper;
    private NumberIterator $iterator;
    private Data $data;
    private FormatedDataService $formatedData;

    public function __construct(NumberIterator $iterator, Data $data)
    {
        $this->iterator = $iterator;
        $this->iteratorhelper = new NumberIteratorHelper($iterator);
        $this->data = $data;
        $this->formatedData = new FormatedDataService();
    }

    public function searchNumberToFind(mixed $collection, int $numberToFind, SearchStrategyInterface $strategy): bool
    {
        $result = $strategy->search($collection, $numberToFind);

        if ($result !== false) {
            echo "Le nombre $numberToFind a été trouvé à l'index $result \n";
            return true;
        } else {
            echo "Le nombre $numberToFind n'a pas été trouvé. \n";
            return false;
        }
    }

    public function runIteratorCommand(): void
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
                    $this->data->add($value);
                    // Réinstancie l'iterator pour prendre en compte la nouvelle valeur
                    $this->iterator = new NumberIterator($this->data->getAll());
                    $this->iteratorhelper = new NumberIteratorHelper($this->iterator);
                    echo "Valeur ajoutée !\n";
                    break;
                case '5':
                    echo "Au revoir !\n";
                    exit;
                default:
                    echo "Choix invalide.\n";
            }
        }
    }

    public function runStrategyCommand(): void 
    {
        while(true) 
        {
            echo "\n--- Menu Strategy ---\n";
            echo "1. Parcours linéaire\n";
            echo "2. Parcours binaire\n";
            $choice = readline("Votre choix : ");

            switch ($choice) {
                case '1':
                    echo "Parcours linéaire sélectionné.\n";
                    /** @var SearchStrategyInterface $strategy */
                    $strategy = new LinearSearchStrategy;
                    $numberToFInd = intval(readline("Entrez un nombre à rechercher : "));
                    $this->searchNumberToFind($this->data->getAll(), $numberToFInd, $strategy);
                    break;
                case '2':
                    echo "Parcours binaire sélectionné.\n";
                    /** @var SearchStrategyInterface $strategy */
                    $strategy = new BinarySearchStrategy;
                    $numberToFInd = intval(readline("Entrez un nombre à rechercher : "));
                    $data = $this->formatedData->sortArray($this->data->getAll());
                    foreach($data as $index => $value) {
                        if ($data !== false) {
                            echo "Élément " . ($index + 1) . " : " . $value . "\n";
                        }
                    }
                    $this->searchNumberToFind($data, $numberToFInd, $strategy);
                    break;
                default:
                    echo "Choix invalide.\n";
                    continue 2;
            }
            break;
        }
    }
}
