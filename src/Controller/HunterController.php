<?php
namespace App\Controller;

use App\Entity\Hunter;
use App\Controller\Abstract\AbstractController;
use App\Controller\Abstract\AbstractKillController;

final class HunterController extends AbstractKillController
{

    public function __construct(Hunter $player)
    {
        parent::__construct($player);
        $this->role = $player->role;
    }
}