<?php

use App\Services\CommandManager;
use App\Services\NumberIterator;
use App\Services\NumberIteratorHelper;
use App\Entity\Data; 

require __DIR__ . '/vendor/autoload.php';

class Main {

    private NumberIteratorHelper $iteratorhelper;
    private NumberIterator $iterator;
    private Data $data;
    private CommandManager $commandManager;

    public function __construct() {
        $this->data = new Data(range(1, 10));
        $this->iterator = new NumberIterator($this->data->getAll());
        $this->iteratorhelper = new NumberIteratorHelper($this->iterator);
        $this->commandManager = new CommandManager($this->iterator);
    }

    function main() {

        $readline = readline("Entrée la commande souhaiter : ");

        if ($readline === "find") {
            $this->commandManager->runFindCommand();
        }
    }
}

$thisApp = new Main();
$thisApp->main();