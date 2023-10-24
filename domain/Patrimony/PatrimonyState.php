<?php

namespace Domain\Patrimony;

use Domain\Patrimony\Exceptions\PatrimonyException;

enum PatrimonyState: int
{
    case NORMAL = 1;
    case TECHNICAL_SUPPORT = 2;
    case MOVEMENT = 3;
    case Borrow = 4;
    case LOSS = 5;

    public function getLabel(): string
    {
        return match ($this) {
            self::NORMAL => 'Normal',
            self::TECHNICAL_SUPPORT => 'suporte técnico',
            self::MOVEMENT => 'movimentação',
            self::Borrow => 'Empréstimo',
            self::LOSS => 'Baixado'
        };
    }

    public function changeToMovement(): self
    {
        $this->allowMovement();
        if ($this === self::NORMAL) {
            return self::MOVEMENT;
        }
        return $this;
    }

    private function allowMovement(): void
    {
        if ($this !== self::NORMAL && $this !== self::TECHNICAL_SUPPORT) {
            $msg = sprintf("Não é possível iniciar uma movimentação com do patrimônio com o satus '%s'", $this->getLabel());
            throw new PatrimonyException($msg);
        }
    }
}