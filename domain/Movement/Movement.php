<?php

namespace Domain\Movement;

use Domain\Movement\Contracts\MovementItemInterface;

class Movement
{
    private int $id;

    /** @var array<MovementItemInterface> */
    private array $MovementItems = [];
    private MovementState $state;

    public function __construct()
    {
        $this->changeState(MovementState::DRAFT);
    }

    public function addItem(MovementItemInterface $movementItem): void
    {
        $this->state->allowAdditem();

        $this->MovementItems[] = $movementItem;
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