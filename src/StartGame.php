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
$wereWolf = new WereWolf("Juliano");
$voyant = new Voyant("Jina");
$voyant = new VoyantController($voyant);
$mayor = new Mayor("Joey");
$mayor = new MayorController($mayor);

$players = [$hunter, $witch, $wereWolf, $voyant, $cupid, $mayor, $villager, $littleGirl];

// TODO : automatiser la mort du partenaire quand l'un des mariés meurt
// TODO : automatiser le double vote du maire



// STEP 1 CUPIDON MARIE
// STEP 2 ELECTION DU MAIRE
// STEP 3 TOUT LE MONDE S'ENDORT
// STEP 4 ...
$cupid->marry($villager, $hunter);
$littleGirl->openHerEyes();
$witch->kill($hunter);
$hunter->kill($witch);
$voyant->seeAnotherRole($wereWolf);
$mayor->accuseAgain($villager);



// print_r($cupid);
// print_r($hunter);
// print_r($witch);
// print_r($littleGirl);
// print_r($villager);
// print_r($wereWolf);
// print_r($voyant);
// print_r($mayor);
