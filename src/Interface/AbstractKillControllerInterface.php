<?php
namespace App\Interface;

use Exception;
use App\Entity\Abstract\AbstractPlayer;

interface AbstractKillControllerInterface {

  public function isAllowedTokill(): bool;

  public function hunterIsDead(AbstractPlayer $player): bool;

  public function kill(AbstractPlayer $target): AbstractPlayer | Exception;
}