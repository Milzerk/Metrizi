<?php

namespace Domain\Movement\States;
use Domain\Movement\Exceptions\MovementException;

abstract class MovementState
{
    protected int $stateValue;
    protected string $stateLabel;

    public function getValue(): int
    {
        if(empty($this->stateValue)) {
            $msg = sprintf("Valor do status %s não foi definido", $this::class);
            throw new MovementException($msg);
        }

        return $this->stateValue;
    }

    public function getLabel(): string
    {
        if(empty($this->stateLabel)) {
            $msg = sprintf("Label do status %s não foi definido", $this::class);
            throw new MovementException($msg);
        }

        return $this->stateLabel;
    }

    public abstract function approve(): void;

    public abstract function reject(): void;
}