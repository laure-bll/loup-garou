<?php
namespace App\Controller;

use Exception;
use App\Entity\LittleGirl;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;

final class LittleGirlController extends AbstractController
{

    public function __construct(LittleGirl $player)
    {
        parent::__construct($player);
        $this->role = $player->role;
    }

    public function OpenHerEyes() : bool | Exception
    {
        if ($this->isAlive) {
            return true;
        }

        return throw new Exception("Les morts ne peuvent pas ouvrir les yeux.");
    }
}