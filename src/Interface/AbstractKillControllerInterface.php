<?php
namespace App\Interface;

use Exception;
use App\Entity\Abstract\AbstractPlayer;

interface AbstractKillControllerInterface
{

    public function isAllowedTokill(): bool;

    public function hunterIsDead(AbstractPlayer $player): void;

    public function kill(AbstractPlayer $target): AbstractPlayer | Exception;

    public function killPartner(AbstractPlayer $player): AbstractPlayer | null;
}