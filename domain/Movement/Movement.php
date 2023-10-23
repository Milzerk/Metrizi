<?php

namespace Domain\Movement;

use Domain\Movement\Exceptions\MovementException;
use Domain\Movement\States\MovementStateContext;
use Domain\Patrimony\Patrimony;

class Movement
{
    private int $id;
    private array $MovementItems = [];
    private MovementStateContext $status;

    public function __construct() {
        $this->status = new MovementStateContext;
        echo $this->status->getLabel() . '<br>';
    }

    public function addPatrimony(Patrimony $patrimony): void
    {
        if (!$this->status->inDraft()) {
            throw new MovementException('Não é possível adicionar patrimônio a uma movimentação já iniciada');
        }

        $this->MovementItems[] = $patrimony->startMovement(new MovementItem);
    }

    public function startMovement(): void
    {
        $this->status->startMovement();

    }

    public function approve(): void
    {
        $this->status->approve();
    }
}