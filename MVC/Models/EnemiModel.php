<?php

namespace models;

class EnemiModel extends EntityModel
{
    public int $id;
    public string $nom, $imageName;
    public bool $isBoss;

    public function __construct($id, $attack, $defense, $health, $nom, $imageName, $isBoss)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->imageName = $imageName;
        $this->isBoss = $isBoss;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->health = $health;
    }
}