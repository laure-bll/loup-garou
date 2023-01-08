<?php
namespace App\Entity;

use App\Entity\Abstract\AbstractPlayer;

class WereWolf extends AbstractPlayer
{

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->name = $name;
        $this->role = "Loup-garou";
    }
}