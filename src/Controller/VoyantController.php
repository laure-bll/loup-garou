<?php
namespace App\Controller;

use Exception;
use App\Entity\Voyant;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;

final class VoyantController extends AbstractController {

  public function __construct(Voyant $player) {
    parent::__construct($player);
    $this->role = $player->role;
  }

  public function seeAnotherRole(AbstractPlayer $player) : bool | Exception {
    if($this->isAlive) {
      if($player->isAlive === true) {
        echo "{$this->getName()} {$this->getRole()} a vu le rôle de {$player->getName()} {$player->getRole()}." . PHP_EOL;
        return true;
      }
      return throw new Exception("Les morts ne peuvent pas être vus." . PHP_EOL);
    }

    return throw new Exception("Les morts ne voient pas." . PHP_EOL);
  }
}