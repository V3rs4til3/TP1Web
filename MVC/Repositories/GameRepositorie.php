<?php

namespace repositories;

class GameRepositorie
{
    function insertAllMonsters(\PDO $bd):void{
        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Lord Farquaad', \PDO::PARAM_STR);
        $query->bindValue(2, 10, \PDO::PARAM_INT);
        $query->bindValue(3, 10, \PDO::PARAM_INT);
        $query->bindValue(4, 100, \PDO::PARAM_INT);
        $query->bindValue(5, 'lord.png', \PDO::PARAM_STR);
        $query->bindValue(6, true, \PDO::PARAM_BOOL);
        $query->execute();

        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Dragon', \PDO::PARAM_STR);
        $query->bindValue(2, 20, \PDO::PARAM_INT);
        $query->bindValue(3, 5, \PDO::PARAM_INT);
        $query->bindValue(4, 50, \PDO::PARAM_INT);
        $query->bindValue(5, 'dragon.png', \PDO::PARAM_STR);
        $query->bindValue(6, true, \PDO::PARAM_BOOL);
        $query->execute();

        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Chat botte', \PDO::PARAM_STR);
        $query->bindValue(2, 15, \PDO::PARAM_INT);
        $query->bindValue(3, 10, \PDO::PARAM_INT);
        $query->bindValue(4, 5, \PDO::PARAM_INT);
        $query->bindValue(5, 'cat.png', \PDO::PARAM_STR);
        $query->bindValue(6, true, \PDO::PARAM_BOOL);
        $query->execute();
    }

    function createMonsterTable(\PDO $bd):void{
        $query = $bd->query('CREATE TABLE IF NOT EXISTS monster (
            id int auto_increment,
            nom varchar(255),
            attack int,
            defense int,
            health int,
            imageName varchar(255),
            isBoss bool,
            primary key(id)
        )');
        $query->execute();

        //$this->insertAllMonsters($bd);
    }
}