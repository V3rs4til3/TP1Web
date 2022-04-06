<?php

namespace models;

class EntityModel
{
    public int $health = 10,
        $vieActu = 10,
        $attack = 10,
        $defense = 10;

    public static function lancerDee(): int{
        return rand(1,10);
    }

    public function sessionAttack(EntityModel $defending): void{
        $nbDegat = $this->resultatCombat($this->attack(), $defending->defense());
        if($nbDegat >= 1)
            $defending->vieActu -= $nbDegat;
    }

    public function attack(): int{
        $success = 0;
        for ($i = 0; $i < $this->attack; $i++){
            if(EntityModel::lancerDee() >= 6){
                $success++;
            }
        }
        return $success;
    }

    public function defense(): int{
        $success = 0;
        for ($i = 0; $i < $this->defense; $i++){
            if(EntityModel::lancerDee() >= 6){
                $success++;
            }
        }
        return $success;
    }

    public function resultatCombat(int $succAttack, int $succDef):int{
        if ($succAttack > $succDef)
            return $succAttack - $succDef;
        return 0;
    }
}