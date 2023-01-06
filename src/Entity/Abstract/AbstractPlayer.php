<?php
namespace App\Entity\Abstract;

use App\Entity\Abstract\AbstractPlayer;

abstract class AbstractPlayer {
  protected string $name;
  protected string $role;
  protected bool $isAlive;
  protected bool $isAwake;
  protected AbstractPlayer | null $marriedWith;
  protected array $deadPlayers = [];

  public function __construct(string $name) {
    $this->name = $name;
    $this->isAlive = true;
    $this->isAwake = true;
    $this->marriedWith = null;
  }

  public function setRole(string $role): self {
    $this->role = $role;
    return $this;
  }

  public function getRole(): string {
    return $this->role;
  }

  public function setName(string $name): self {
    $this->name = $name;
    return $this;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setIsAlive(bool $isAlive): self {
    $this->isAlive = $isAlive;
    return $this;
  }

  public function getIsAlive(): bool {
    return $this->isAlive;
  }

  public function setIsAwake(bool $isAwake): self {
    $this->isAwake = $isAwake;
    return $this;
  }

  public function getIsAwake(): bool {
    return $this->isAwake;
  }

  public function setMarriedWith(AbstractPlayer $player): self {
    $this->marriedWith = $player;
    return $this;
  }

  public function getMarriedWith(): AbstractPlayer | null {
    return $this->marriedWith;
  }
}