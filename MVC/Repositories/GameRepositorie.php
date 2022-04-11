<?php

namespace Repositories;

class GameRepositorie
{
    function insertAllMonsters(\PDO $bd):void{
        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Lord Farquaad', \PDO::PARAM_STR);
        $query->bindValue(2, 15, \PDO::PARAM_INT);
        $query->bindValue(3, 10, \PDO::PARAM_INT);
        $query->bindValue(4, 100, \PDO::PARAM_INT);
        $query->bindValue(5, 'lord.png', \PDO::PARAM_STR);
        $query->bindValue(6, true, \PDO::PARAM_BOOL);
        $query->execute();

        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Dragon', \PDO::PARAM_STR);
        $query->bindValue(2, 20, \PDO::PARAM_INT);
        $query->bindValue(3, 10, \PDO::PARAM_INT);
        $query->bindValue(4, 50, \PDO::PARAM_INT);
        $query->bindValue(5, 'dragon.png', \PDO::PARAM_STR);
        $query->bindValue(6, false, \PDO::PARAM_BOOL);
        $query->execute();

        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Chat botte', \PDO::PARAM_STR);
        $query->bindValue(2, 15, \PDO::PARAM_INT);
        $query->bindValue(3, 10, \PDO::PARAM_INT);
        $query->bindValue(4, 5, \PDO::PARAM_INT);
        $query->bindValue(5, 'cat.png', \PDO::PARAM_STR);
        $query->bindValue(6, false, \PDO::PARAM_BOOL);
        $query->execute();

        $query = $bd->prepare('INSERT INTO monster (nom, attack, defense, health, imageName, isBoss) 
            VALUES (?,?,?,?,?,?)');
        $query->bindValue(1, 'Cookie', \PDO::PARAM_STR);
        $query->bindValue(2, 5, \PDO::PARAM_INT);
        $query->bindValue(3, 5, \PDO::PARAM_INT);
        $query->bindValue(4, 5, \PDO::PARAM_INT);
        $query->bindValue(5, 'cookie.png', \PDO::PARAM_STR);
        $query->bindValue(6, false, \PDO::PARAM_BOOL);
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

    function getOneMonster(\PDO $bd):\Models\EnemiModel{
        $query = $bd->prepare('SELECT * FROM monster WHERE isBoss = ? ORDER BY RAND() LIMIT 1');
        $query->bindValue(1, false, \PDO::PARAM_BOOL);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, "\Models\EnemiModel");
        return $query->fetch();
    }

    function getOneBoss(\PDO $bd):\Models\EnemiModel{
        $query = $bd->prepare('SELECT * FROM monster WHERE isBoss = ? ORDER BY RAND() LIMIT 1');
        $query->bindValue(1, true, \PDO::PARAM_BOOL);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, "\Models\EnemiModel");
        return $query->fetch();
    }
}