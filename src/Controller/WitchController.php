<?php
namespace App\Controller;

use App\Entity\Witch;
use App\Controller\Abstract\AbstractController;
use App\Controller\Abstract\AbstractKillController;

final class WitchController extends AbstractKillController {

  public function __construct(Witch $player) {
    parent::__construct($player);
    $this->role = $player->role;
  }
}