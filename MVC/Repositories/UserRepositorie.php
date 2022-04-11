<?php

namespace Repositories;

class UserRepositorie
{
    function getOne(\PDO $bd, string $username): \Models\UserModel|bool {
        $query = $bd->prepare('SELECT * FROM users WHERE username = ?');
        $query->bindValue(1, $username, \PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, "\Models\UserModel");
        return $query->fetch();
    }

    function newInsert(\PDO $bd, \models\UserModel $user) : void{
        $query = $bd->prepare('INSERT INTO users (username, password, shillings) VALUES (?, ?, ?)');
        $query->bindValue(1, $user->username, \PDO::PARAM_STR);
        $query->bindValue(2, $user->password, \PDO::PARAM_STR);
        $query->bindValue(3, 0, \PDO::PARAM_INT);
        $query->execute();
    }

    function updatePlayer(\PDO $bd, \models\UserModel $user):void{
        $query = $bd->prepare('UPDATE users SET shillings = ? WHERE id = ?');
        $query->bindValue(1, $user->shillings, \PDO::PARAM_STR);
        $query->bindValue(2, $user->id, \PDO::PARAM_STR);
        $query->execute();
    }

    function createTable(\PDO $bd): void{
        $query = $bd->query('CREATE TABLE IF NOT EXISTS users (
            id int auto_increment,
            username varchar(255),
            password varchar(255),
            shillings int,
            primary key(id)
        )');
        $query->execute();
    }

    function saveGame(int $playerID, int $shillings, \PDO $bd):void{
        $query = $bd->prepare('UPDATE users SET shillings = ? WHERE id = ?');
        $query->bindValue(1, $shillings, \PDO::PARAM_INT);
        $query->bindValue(2, $playerID, \PDO::PARAM_INT);
        $query->execute();
    }
}