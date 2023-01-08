<?php
namespace App\Controller\Abstract;

use Exception;
use App\Controller\WitchController;
use App\Controller\HunterController;
use App\Entity\Abstract\AbstractPlayer;
use App\Interface\AbstractKillControllerInterface;

class AbstractKillController extends AbstractController implements AbstractKillControllerInterface
{

    public function __construct(AbstractPlayer $player)
    {
        parent::__construct($player);
    }

    public function isAllowedTokill(): bool
    {
        return ($this->role === "Chasseur" && $this->isAlive === false) || ($this->role !== "Chasseur" && $this->isAlive === true);
    }

    public function hunterIsDead(AbstractPlayer $player): void
    {
        echo is_a($player, HunterController::class) ? "Le chasseur est mort et peut tuer la cible de son choix." . PHP_EOL : "";
    }

    public function killPartner(?AbstractPlayer $partner): AbstractPlayer | null
    {
        if (isset($partner) && !is_null($partner)) {
            $partner->setIsAlive(false);
            "La cible était mariée et a entraîné la mort de {$partner->getName()} {$partner->getRole()}." . PHP_EOL;
            array_push($this->deadPlayers, $partner);

            return $partner;
        }

        return null;
    }

    public function kill(?AbstractPlayer $target = null): AbstractPlayer | Exception
    {
        if ($this->isAllowedTokill()) {

            // Vérifie qu'il y a une victime et que ce n'est pas un suicide.
            if (isset($target) && $target !== $this) {
                if ($target->isAlive === true) {

                    // Tue la cible.
                    $target->setIsAlive(false);
                    array_push($this->deadPlayers, $target);
                    echo "{$target->getName()} {$target->getRole()} est mort(e)." . PHP_EOL;
          
                    // Tue le partenaire si la victime est mariée.
                    $this->killPartner($target->getMarriedWith());

                    // Le chasseur peut tuer si c'est lui qui vient de mourir.
                    $this->hunterIsDead($target);

                    return $target;
                }

                return throw new \Exception("{$target->name} {$target->role} est déjà mort(e).");
            }
        }

        if (is_a($this, WitchController::class)) {
            echo "La sorcière a décidé de ne pas tuer." . PHP_EOL;
        }
    
        return throw new \Exception("Vous ne pouvez pas tuer.");
    }
}