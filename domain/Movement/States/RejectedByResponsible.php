<?php

namespace Domain\Movement\States;

use Domain\Movement\Exceptions\MovementException;

class RejectedByResponsible extends MovementState
{
	protected int $stateValue = 5;
    protected string $stateLabel = 'Rejeitado pelo responsávael' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		throw new MovementException("Movimentação rejeitada pelo o responsável");
	}

	public function reject(): void
	{
		throw new MovementException("Movimentação rejeitada pelo o responsável");
	}
}