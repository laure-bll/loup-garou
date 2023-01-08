<?php
namespace App\Controller;

use Exception;
use App\Entity\Cupid;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;

final class CupidController extends AbstractController
{

    public function __construct(Cupid $player)
    {
        parent::__construct($player);
        $this->role = $player->role;
    }

    public function marry(AbstractPlayer $player1, AbstractPlayer $player2) : string | Exception
    {
        if($player1->isAlive and $player2->isAlive) {
            $player1->setMarriedWith($player2);
            $player2->setMarriedWith($player1);

            $wedding = "{$player1->getName()} {$player1->getRole()} et {$player2->getName()} {$player2->getRole()} sont mariés." . PHP_EOL;
            echo $wedding;
            return $wedding;
        }

        return throw new Exception("Vous ne pouvez marier que les vivants.");
    }
}