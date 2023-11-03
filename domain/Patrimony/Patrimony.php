<?php

namespace Domain\Patrimony;

class Patrimony
{
    public function __construct(
        private int $id,
        private int $numPatrimonio,
        private PatrimonyState $state = PatrimonyState::NORMAL
    ) {
    }
}