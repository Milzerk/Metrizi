<?php

namespace Domain\Movement;

use Domain\Patrimony\Patrimony;

class Movement
{
    private int $id;
    private array $MovementItems = [];
    private MovementState $state;

    public function __construct()
    {
        $this->changeState(MovementState::DRAFT);
    }

    public function addPatrimony(Patrimony $patrimony): void
    {
        $this->state->allowAdditem();
        $this->MovementItems[] = $patrimony->newMovementItem(new MovementItem);
    }

    public function startMovement(): void
    {
        $this->changeState($this->state->startMovement());
    }

    public function approve(): void
    {
        $this->changeState($this->state->approve());
    }

    public function reject(): void
    {
        $this->changeState($this->state->reject());
    }

    private function changeState(MovementState $state)
    {
        $this->state = $state;
        echo $this->state->getLabel() . "<br>";
    }
}