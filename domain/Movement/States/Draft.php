<?php

namespace Domain\Movement\States;

use Domain\Movement\Exceptions\MovementException;

class Draft extends MovementState
{
	protected int $stateValue = 1;
    protected string $stateLabel = 'Rascunho' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		$state = new WaitingAdmin($this->context);
		$this->context->changeState($state);
	}

	public function reject(): void
	{
		throw new MovementException("Não é possível rejeitar um movimento em rascunho");
	}
}