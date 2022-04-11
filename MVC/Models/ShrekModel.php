<?php

namespace Models;

class ShrekModel extends EntityModel
{
    public string $nom;
    function __construct()
    {
       $this->nom = 'shrek';
       $this->attack = 20;
       $this->defense = 30;
       $this->health = 50;
       $this->vieActu = $this->health;
    }

    function specialAttack(EntityModel $defender): int{
        //heals for 50% of missing health, adds 10% of health to attack for the rest of the game
        $degat = $this->sessionAttack($defender);
        $this->vieActu += ceil(($this->health - $this->vieActu) * 0.5);
        $this->health += ceil($this->health * 0.1);
        return $degat;
    }
    function passive():void{
        //heals for 10% of missing health
        if($this->vieActu + $this->health * (1/10) <= $this->health)
            $this->vieActu += ceil( ($this->health - $this->vieActu) * (1/10)) ;
    }
}