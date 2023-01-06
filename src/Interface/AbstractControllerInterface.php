<?php
namespace App\Interface;

use Exception;
use App\Entity\Abstract\AbstractPlayer;

interface AbstractControllerInterface {
  public function sleep(): bool | Exception;

  public function wakeUp(): bool | Exception;

  public function chooseMayor(AbstractPlayer $character): AbstractPlayer | Exception;

  public function accuse(AbstractPlayer $target): AbstractPlayer | Exception;
}