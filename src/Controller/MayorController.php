<?php
namespace App\Controller;

use Exception;
use App\Entity\Mayor;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;

final class MayorController extends AbstractController {

  public function __construct(Mayor $player) {
    parent::__construct($player);
    $this->role = $player->role;
  }

  public function accuseAgain(AbstractPlayer $target) : AbstractPlayer | Exception {
    if($this->isAlive) {
      $this->accuse($target);
      echo "Le maire a encore voté." . PHP_EOL;
      return $target;
    }

    return throw new Exception("Les morts ne votent pas.");
  }
}