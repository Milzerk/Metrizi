<?php

namespace Domain\Movement\States;

class WaitingResponsible extends MovementState
{
	protected int $stateValue = 3;
    protected string $stateLabel = 'Aguardando Responsável' ;

	public function __construct(
		private MovementStateContext $context
	) {
	}

	public function approve(): void
	{
		$state = new Finished($this->context);
		$this->context->changeState($state);
	}

	public function reject(): void
	{
		$state = new RejectedByResponsible($this->context);
		$this->context->changeState($state);
	}
}