<?php
namespace App\Controller;

use App\Entity\Villager;
use App\Controller\Abstract\AbstractController;

final class VillagerController extends AbstractController {

  public function __construct(Villager $player) {
    parent::__construct($player);
    $this->role = $player->role;
  }
}