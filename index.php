<?php
use Domain\Movement\Movement;
use Domain\Patrimony\Patrimony;
use Domain\Patrimony\PatrimonyState;

set_exception_handler(function($ex) {
    echo "<br><br><br>";
    echo "erro: ". $ex->getMessage() . PHP_EOL;
    die();
});

require_once './vendor/autoload.php';

$patrimony = new Patrimony(1, 123456);
$patrimony2 = new Patrimony(1, 123456, PatrimonyState::TECHNICAL_SUPPORT);
$patrimony3 = new Patrimony(1, 123456);
$patrimony4 = new Patrimony(1, 123456);

$movement = new Movement();


$movement->addPatrimony($patrimony);
$movement->addPatrimony($patrimony2);
$movement->addPatrimony($patrimony3);
$movement->addPatrimony($patrimony4);

$movement->startMovement();

$movement->approve();
$movement->approve();

echo '<br>tudo certo';