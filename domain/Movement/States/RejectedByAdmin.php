<?php

namespace Domain\Movement\States;

use Domain\Movement\Exceptions\MovementException;

class RejectedByAdmin extends MovementState
{
	protected int $stateValue = 4;
    protected string $stateLabel = 'Rejeitado pelo administrador' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		throw new MovementException("Movimentação rejeitada pelo o administrador");
	}

	public function reject(): void
	{
		throw new MovementException("Movimentação rejeitada pelo o administrador");
	}
}