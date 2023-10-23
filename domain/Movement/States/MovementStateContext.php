<?php

namespace Domain\Movement\States;

use Domain\Movement\Exceptions\MovementException;

class MovementStateContext
{
    private MovementState $state;

    public function __construct(?MovementState $state = null)
    {
        $this->state = new Draft($this);
    }

    public function getValue(): int
    {
        return $this->state->getValue();
    }

    public function getLabel(): string
    {
        return $this->state->getLabel();
    }

    public function changeState(MovementState $state): void
    {
        $this->state = $state;
    }

    public function approve()
    {
        $this->state->approve();
        echo $this->state->getLabel() . '<br>';

    }

    public function reject()
    {
        $this->state->reject();
    }

    public function inDraft(): bool
    {
        return $this->state instanceof Draft;
    }

    public function startMovement(): void
    {
        if (!$this->state instanceof Draft) {
            throw new MovementException("Movimentação já foi iniciada");
        }

        $this->approve();
    }
}