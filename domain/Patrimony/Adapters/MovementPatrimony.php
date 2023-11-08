<?php

namespace Domain\Patrimony\Adapters;
use Domain\Movement\Contracts\MovementItemInterface;
use Domain\Patrimony\Patrimony;

class MovementPatrimony extends Patrimony implements MovementItemInterface
{
	public function allowAddInMovement(): void {
        
	}
}