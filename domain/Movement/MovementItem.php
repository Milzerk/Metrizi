<?php

namespace Domain\Movement;
use Domain\Patrimony\Patrimony;

class MovementItem
{
    private int $id;
    private int $patrimonyId;

    public function setPatrimonyId(int $id): void
    {
        $this->id = $id;
    }
}