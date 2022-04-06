<?php

namespace controllers;

use repositories\GameRepositorie;

class GameController
{
    function ViewSelection():void{
        if(isset($_SESSION['player'])){
            require __DIR__ . '../../Views/Play/selection.php';
        }
    }

    function createTable():void{
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306',
            'root', 'root');
        $monstre = new GameRepositorie();
        $monstre->createMonsterTable($bd);
    }


    function Disconnect(){
        session_unset();
        session_destroy();
        header('location: /MVC/Home/index');
    }
}