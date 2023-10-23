<?php

namespace Domain\Movement\States;

use Domain\Movement\Exceptions\MovementException;

class Finished extends MovementState
{
	protected int $stateValue = 6;
    protected string $stateLabel = 'Finalizado' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		throw new MovementException("Movimentação já foi finalizada");
	}

	public function reject(): void
	{
		throw new MovementException("Movimentação já foi finalizada");
	}
}