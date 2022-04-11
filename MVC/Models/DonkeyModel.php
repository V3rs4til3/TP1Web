<?php

namespace Models;

class DonkeyModel extends EntityModel
{
    public string $nom;
    public function __construct()
    {
        $this->nom = "Donkey";
        $this->attack = 20;
        $this->defense = 5;
        $this->health = 20;
        $this->vieActu = $this->health;
    }

    public function specialAttack(EntityModel $defender):int{
        //boost sa defense by 5 everytime it is used
        $this->defense += 5;
        return $this->sessionAttack($defender);
    }

    public function passive(){
        //gagne 1hp
        $this->vieActu += 1;
    }

}