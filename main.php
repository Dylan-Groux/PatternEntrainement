<?php

use App\Services\CommandManager;
use App\Services\NumberIterator;
use App\Entity\Data; 

require __DIR__ . '/vendor/autoload.php';

class Main {

    private NumberIterator $iterator;
    private Data $data;
    private CommandManager $commandManager;

    public function __construct() {
        $number = range(1,15);
        shuffle($number);
        $this->data = new Data($number);
        $this->iterator = new NumberIterator($this->data->getAll());
        $this->commandManager = new CommandManager($this->iterator, $this->data);
    }

    function main() {

        $readline = readline("Entrée la commande souhaiter : ");

        if ($readline === "iterator") {
            $this->commandManager->runIteratorCommand();
        } elseif ($readline === "strategy") {
            $this->commandManager->runStrategyCommand();
        } else {
            echo "Commande inconnue\n";

        }
    }
}

$thisApp = new Main();
$thisApp->main();