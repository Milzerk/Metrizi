<?php

namespace Domain\Patrimony;
use Domain\Movement\MovementItem;
use Domain\Patrimony\Exceptions\PatrimonyException;

class Patrimony
{
    public function __construct(
        private int $id,
        private int $numPatrimonio,
        private string $status = 'Normal'
    ) {
    }

    /**
     * @throws PatrimonyException
     */
    public function startMovement(MovementItem $item): MovementItem
    {
        if($this->status != 'Normal' && $this->status != 'technicalSupport') {
            $msg = sprintf("Não é possível iniciar uma movimentação com o satus '%s'", $this->status);
            throw new PatrimonyException($msg);
        }
    
        if($this->status != 'technicalSupport') {
            $this->status = 'Movement';
        }
    
        $item->setPatrimonyId($this->id);
        return $item;
    }
}