<?php
use Domain\Movement\Movement;
use Domain\Patrimony\Patrimony;

set_exception_handler(function($ex) {
    echo "". $ex->getMessage() . PHP_EOL;
    die();
});

require_once './vendor/autoload.php';

$patrimony = new Patrimony(1, 123456,);
$patrimony2 = new Patrimony(1, 123456);
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
echo 'tudo certo';