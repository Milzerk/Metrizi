<?php

namespace Domain\Movement;

use Domain\Movement\Exceptions\MovementException;

enum MovementState: int
{
    case DRAFT = 1;
    case WAITING_ADMIN = 2;
    case WAITING_RESPONSIBLE = 3;
    case REJECTED_BY_ADMIN = 4;
    case REJECTED_BY_RESPONSIBLE = 5;
    case FINISHED = 6;

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => "rascunho",
            self::WAITING_ADMIN => "aguardando administrador",
            self::WAITING_RESPONSIBLE => "aguardando responsável",
            self::REJECTED_BY_ADMIN => "rejeitado pelo administrador",
            self::REJECTED_BY_RESPONSIBLE => "rejeitado pelo responsável",
            self::FINISHED => "finalizado"
        };
    }

    public function startMovement(): self
    {
        if (!$this->isDraft()) {
            throw new MovementException("Movimentação já foi iniciado");
        }

        return self::WAITING_ADMIN;
    }

    public function approve(): self
    {
        if (!$this->waitingApprove()) {
            $msg = sprintf("O estado %s não permite aprovação", $this->getLabel());
            throw new MovementException($msg);
        }

        return $this->getStateApproved();
    }

    public function reject(): self
    {
        if (!$this->waitingApprove()) {
            $msg = sprintf("O estado %s não permite rejeição", $this->getLabel());
            throw new MovementException($msg);
        }

        return $this->getStateRejected();
    }

    public function allowAdditem(): void
    {
        if (!$this->isDraft()) {
            $msg = sprintf("Não é permitido adicionar item no status %s", $this->getLabel());
            throw new MovementException($msg);
        }
    }

    private function getStateRejected(): self
    {
        return match ($this) {
            self::WAITING_ADMIN => self::REJECTED_BY_ADMIN,
            self::WAITING_RESPONSIBLE => self::REJECTED_BY_RESPONSIBLE
        };
    }

    private function getStateApproved(): self
    {
        return match ($this) {
            self::WAITING_ADMIN => self::WAITING_RESPONSIBLE,
            self::WAITING_RESPONSIBLE => self::FINISHED
        };
    }

    private function isDraft(): bool
    {
        return $this === self::DRAFT;
    }

    private function waitingApprove(): bool
    {
        $waitingAdmin = $this === self::WAITING_ADMIN;
        $waitingResponsible = $this === self::WAITING_RESPONSIBLE;
        return $waitingAdmin || $waitingResponsible;
    }
}