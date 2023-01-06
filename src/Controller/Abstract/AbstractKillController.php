<?php
namespace App\Controller\Abstract;

use Exception;
use App\Interface\AbstractKillControllerInterface;
use App\Entity\Abstract\AbstractPlayer;

class AbstractKillController extends AbstractController implements AbstractKillControllerInterface {

  public function __construct(AbstractPlayer $player) {
    parent::__construct($player);
  }

  public function isAllowedTokill(): bool {
    return ($this->role === "Chasseur" && $this->isAlive === false) || ($this->role !== "Chasseur" && $this->isAlive === true);
  }

  public function hunterIsDead(AbstractPlayer $player): bool {
    return $player->getRole() === "Chasseur";
  }

  public function kill(AbstractPlayer $target): AbstractPlayer | Exception {
    if($this->isAllowedTokill($target)) {
      if($target->isAlive === true) {
        $target->isAlive = false;

        echo "{$target->getName()} {$target->getRole()} est mort(e)." . PHP_EOL;
        echo $this->hunterIsDead($target) ? "Le chasseur peut tuer la cible de son choix." . PHP_EOL : "";

        return $target;
      }

      return throw new \Exception("{$target->name} {$target->role} est déjà mort(e).");
    }
    
    return throw new \Exception("Vous ne pouvez pas tuer."); 
  }
}