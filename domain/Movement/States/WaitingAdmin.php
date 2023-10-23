<?php

namespace Domain\Movement\States;

class WaitingAdmin extends MovementState
{
	protected int $stateValue = 2;
    protected string $stateLabel = 'Aguardando Administrador' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		$state = new WaitingResponsible($this->context);
		$this->context->changeState($state);
	}


	public function reject(): void
	{
		$state = new RejectedByAdmin($this->context);
		$this->context->changeState($state);
	}
}