<?php
namespace App\Controller;

use App\Entity\WereWolf;
use App\Controller\Abstract\AbstractKillController;

final class WereWolfController extends AbstractKillController
{

    public function __construct(WereWolf $player)
    {
        parent::__construct($player);
        $this->role = $player->role;
    }
}