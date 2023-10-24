<?php

namespace Domain\Patrimony;

use Domain\Movement\MovementItem;
use Domain\Patrimony\Exceptions\PatrimonyException;

class Patrimony
{
    public function __construct(
        private int $id,
        private int $numPatrimonio,
        private PatrimonyState $state = PatrimonyState::NORMAL
    ) {
    }

    /**
     * @throws PatrimonyException
     */
    public function newMovementItem(MovementItem $item): MovementItem
    {
        $state = $this->state->changeToMovement();
        $this->state = $state;

        $item->setPatrimonyId($this->id);
        return $item;
    }
}