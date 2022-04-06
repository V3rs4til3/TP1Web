<?php

namespace models;

class ShrekModel extends EntityModel
{
    function __construct()
    {
       $this->attack = 5;
       $this->defense = 30;
       $this->health = 40;
    }

    function specialAttack(): void{
        //heals for 50% of missing health, adds 10% of missing health to attack for the rest of the game
    }
}