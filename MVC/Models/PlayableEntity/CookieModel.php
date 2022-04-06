<?php

namespace models;

class CookieModel extends EntityModel
{
    public function __construct()
    {
        $this->attack = 1;
        $this->defense = 1;
        $this->health = 1;
    }

    public function specialAttack(): int{
        //50% de chance de oneshot l'ennemi
        return "Cookie special attack";
    }
}