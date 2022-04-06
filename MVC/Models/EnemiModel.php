<?php

namespace models;

class EnemiModel extends EntityModel
{
    public int $id;
    public string $nom, $imagename;
    public bool $isBoss;

    public function __construct($id, $attack, $defense, $health, $nom, $imagename, $isBoss)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->imagename = $imagename;
        $this->isBoss = $isBoss;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->health = $health;
    }
}