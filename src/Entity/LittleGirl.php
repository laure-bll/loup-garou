<?php
namespace App\Entity;

use App\Entity\Abstract\AbstractPlayer;

class LittleGirl extends AbstractPlayer
{

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->name = $name;
        $this->role = "Petite fille";
    }
}