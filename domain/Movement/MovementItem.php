<?php

namespace Domain\Movement;

use Domain\Movement\Contracts\PatrimonyInterface;

class MovementItem
{
    private int $id;
    private PatrimonyInterface $patrimony;

    public function __construct(PatrimonyInterface $patrimony)
    {
        $this->patrimony = $patrimony;
    }
}