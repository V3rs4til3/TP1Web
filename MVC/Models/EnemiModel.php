<?php

namespace Models;

class EnemiModel extends EntityModel
{
    public int $id;
    public string $nom, $imageName;
    public bool $isBoss;

    public function __construct()
    {
       $this->vieActu = $this->health;
    }
}