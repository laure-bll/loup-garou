<?php
namespace App\Controller\Abstract;

use Exception;
use App\Entity\Abstract\AbstractPlayer;
use App\Interface\AbstractControllerInterface;

class AbstractController extends AbstractPlayer implements AbstractControllerInterface
{
  
    public function __construct(AbstractPlayer $player)
    {
        parent::__construct($player->name);
    }

    public function sleep(): bool | Exception
    {
        if ($this->isAlive === true) {
            return $this->isAwake = false;
        }

        return throw new Exception("Les morts dorment déjà.");
    }

    public function wakeUp(): bool | Exception
    {
        if ($this->isAlive === true) {
            return $this->isAwake = true;
        }

        return throw new Exception("Les morts ne se réveillent pas.");
    }

    public function chooseMayor(AbstractPlayer $character): AbstractPlayer | Exception
    {
        if ($character->isAlive === true) {
            return $character;
        }

        return throw new \Exception("Vous ne pouvez pas élire un mort.");
    }

    public function accuse(AbstractPlayer $target): AbstractPlayer | Exception
    {
        if ($target->isAlive === true) {
            return $target;
        }
        else {
            return throw new \Exception("Vous ne pouvez pas accuser un mort.");
        }
    }
}