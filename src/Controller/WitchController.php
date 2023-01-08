<?php
namespace App\Controller;

use Exception;
use App\Entity\Witch;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;
use App\Controller\Abstract\AbstractKillController;

final class WitchController extends AbstractKillController
{

    public function __construct(Witch $player)
    {
        parent::__construct($player);
        $this->role = $player->role;
    }

    public function resurrects(): AbstractPlayer
    {
        $lastDeadPlayer = end($this->deadPlayers);
        
        if ($lastDeadPlayer->getMarriedWith() !== null) {
            $lastDeadPlayer->setIsAlive(true);

            $partner = $lastDeadPlayer->getMarriedWith();
            $partner->setIsAlive(true);
        
            echo 'Les joueurs ' . $lastDeadPlayer->getName() . " " . $lastDeadPlayer->getRole() ." et " . $partner->getName(). " " . $partner->getRole() . ' sont ressuscités !!!' . PHP_EOL;
        
            $this->deadPlayers = array_diff($this->deadPlayers, [$lastDeadPlayer, $partner]);
        }
        else{
            $lastDeadPlayer->isAlive = true;
            echo 'Le joueur ' . $lastDeadPlayer->getMarriedWith()->name . ' est ressuscité !!!' . PHP_EOL;
            $this->deadPlayers = array_diff($this->deadPlayers, [$lastDeadPlayer]);
        }

        return $lastDeadPlayer;
    }
}