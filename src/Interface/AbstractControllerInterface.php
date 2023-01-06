<?php
namespace App\Interface;

use Exception;
use App\Entity\Abstract\AbstractPlayer;

interface AbstractControllerInterface {
  public function sleep(): bool;

  public function wakeUp(): bool;

  public function chooseMayor(AbstractPlayer $character): AbstractPlayer | Exception;

  public function accuse(AbstractPlayer $target): AbstractPlayer | Exception;
}