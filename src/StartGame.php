<?php
namespace App;

use App\Entity\Cupid;
use App\Entity\Mayor;
use App\Entity\Witch;
use App\Entity\Hunter;
use App\Entity\Voyant;
use App\Entity\Villager;
use App\Entity\WereWolf;
use App\Entity\LittleGirl;
use App\Controller\CupidController;
use App\Controller\MayorController;
use App\Controller\WitchController;
use App\Controller\HunterController;
use App\Controller\VoyantController;
use App\Controller\VillagerController;
use App\Controller\WereWolfController;
use App\Entity\Abstract\AbstractPlayer;
use App\Controller\LittleGirlController;

require_once "../vendor/autoload.php";

$hunter = new Hunter("John");
$hunter = new HunterController($hunter);
$witch = new Witch("Jane");
$witch = new WitchController($witch);
$cupid = new Cupid("Johnny");
$cupid = new CupidController($cupid);
$littleGirl = new LittleGirl("Jenna");
$littleGirl = new LittleGirlController($littleGirl);
$villager = new Villager("Jade");
$villager = new VillagerController($villager);
$wereWolf = new WereWolf("Juliano");
$wereWolf = new WereWolfController($wereWolf);
$voyant = new Voyant("Jina");
$voyant = new VoyantController($voyant);
// $mayor = new Mayor("Joey");
// $mayor = new MayorController($mayor);

$players = [$hunter, $witch, $wereWolf, $voyant, $cupid, $villager, $littleGirl];

// STEP 1 TOUT LE MONDE DORT
foreach($players as $player) {
    $player->sleep();
}

echo "Tout le monde se réveille." . PHP_EOL;

// STEP 2 CUPIDON MARIE
$cupid->wakeUp();
$cupid->marry($villager, $hunter);
$cupid->sleep();

// STEP 4 TOUT LE MONDE SE REVEILLE
foreach($players as $player) {
    $player->wakeUp();
}

// STEP 4 ELECTION DU MAIRE
$votes = [];
foreach($players as $player) {
    $vote[] = rand(0, count($players) - 1);
}

array_count_values($votes);
asort($votes);

$newMayor = $players[end($votes)];
$indexOfNewMayor = array_search($newMayor, $players);
$mayor = new Mayor($newMayor->getName());
$newMayor->getMarriedWith() ?? "";
$mayor = new MayorController($mayor);
$players[$indexOfNewMayor] = $mayor;

// STEP 5 TOUT LE MONDE DORT
foreach($players as $player) {
    $player->sleep();
}

echo "Tout le monde dort." . PHP_EOL;

// STEP 6 LES LOUPS GAROUS SE REVEILLENT ET TUENT
foreach($players as $player) {
    if (is_a($player, WereWolfController::Class)) {
        $player->wakeUp();
    }
}

echo "Les loups-garous se réveillent." . PHP_EOL;

$wereWolf->kill($players[rand(0, count($players) - 1)]);
$littleGirl->openHerEyes();

foreach($players as $player) {
    if (is_a($player, WereWolfController::Class)) {
        $player->sleep();
    }
}

echo "Les loups-garous se rendorment." . PHP_EOL;

// STEP 7 LA VOYANTE SE REVEILLE ET VOIT
$voyant->wakeUp();
$voyant->seeAnotherRole($wereWolf);
$voyant->sleep();

// STEP 8 LA SORCIERE SE REVEILLE ET TUE PUIS SE FAIT TUER ET RESSUCITE
$witch->wakeUp();
echo "La sorcière se réveille." . PHP_EOL;

$witch->kill($hunter);
$hunter->kill($witch);
$witch->resurrects();
$witch->sleep();
echo "La sorcière se rendort." . PHP_EOL;

// STEP 9 TOUT LE MONDE SE REVEILLE
foreach($players as $player) {
    $player->wakeUp();
}

echo "Tout le monde se réveille." . PHP_EOL;

// STEP 10 TOUT LE MONDE VOTE
$votes = [];

foreach($players as $player) {
    array_push($votes, $player->accuse($players[rand(0, count($players) - 1)]));
}

echo "Tout le monde vote." . PHP_EOL;

$mayor->accuseAgain($wereWolf);
array_push($votes, $wereWolf);

$indexVotes = array_keys($votes);

array_count_values($indexVotes);
asort($votes);
$selectedPlayer = end($votes);

echo "{$selectedPlayer->getName()} {$selectedPlayer->getRole()} est mort(e)." . PHP_EOL;

// STEP FINAL - TOUS LES LOUPS GAROUS SONT MORTS
echo "FIN DU JEU : tous les loups garous sont morts, vive les villageois !!" . PHP_EOL;


// -------------------------------------------- //
// ------------LOGIQUE DU VOTE----------------- //
// -------------------------------------------- //

function selectPlayer($personnages)
{
    $votes = [];
  
    foreach($personnages as $personnage) {
        array_push($votes, $personnage->accuse($personnages[rand(0, count($personnages) - 1)]));
    }
  
    $indexVotes = array_keys($votes);
  
    array_count_values($indexVotes);
    asort($votes);
    $personnageChoisi = end($votes);
  
    return $personnageChoisi;
}
