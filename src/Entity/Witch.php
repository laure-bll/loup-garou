<?php
namespace App\Entity;

use App\Entity\Abstract\AbstractPlayer;
use App\Controller\Abstract\AbstractController;

final class Witch extends AbstractPlayer
{

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->name = $name;
        $this->role = "Sorcière";
    }
}