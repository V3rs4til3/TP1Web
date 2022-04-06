<?php

namespace models;

class DonkeyModel extends EntityModel
{
    public function __construct()
    {
       $this->attack = 20;
       $this->defense = 5;
       $this->health = 20;
    }

    public function specialAttack(){
        //boost sa defense by 5 everytime it is used
        return "I'm a donkey, I don't have a special attack";
    }

}