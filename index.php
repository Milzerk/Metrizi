<?php

use Domain\Movement\Movement;
use Domain\Patrimony\Adapters\MovementPatrimony;
use Domain\Patrimony\PatrimonyState;

set_exception_handler(function ($ex) {
    echo "<br><br><br>";
    echo "erro: " . $ex->getMessage() . PHP_EOL;
    die();
});

require_once './vendor/autoload.php';

$patrimony = new MovementPatrimony(1, 123456);
$patrimony2 = new MovementPatrimony(1, 123456, PatrimonyState::TECHNICAL_SUPPORT);
$patrimony3 = new MovementPatrimony(1, 123456);
$patrimony4 = new MovementPatrimony(1, 123456);

$movement = new Movement();


$movement->addItem($patrimony);
$movement->addItem($patrimony2);
$movement->addItem($patrimony3);
$movement->addItem($patrimony4);

$movement->startMovement();

$movement->approve();
$movement->approve();

echo '<br>tudo certo';