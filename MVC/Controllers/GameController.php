<?php

namespace controllers;

use Models\EnemiModel;
use Models\FloorModel;
use Models\DoorModel;
use Repositories\GameRepositorie;
use Repositories\UserRepositorie;

class GameController
{
    function ViewSelection():void{
        if(isset($_POST['radio'])){
            $modelName = $_POST['radio'];
            $modelName = '\Models\\' . $modelName . 'Model';

            if (class_exists($modelName)) {
                $model = new $modelName();
                $_SESSION['character'] = $model; //to do {modifier les stats par rapport a ses shillings}
                if ($_SESSION['player']->shillings > 0){
                    $boost = ceil($_SESSION['player']->shillings * 0.1);
                    $_SESSION['character']->attack += $boost;
                    $_SESSION['character']->defense += $boost;
                    $_SESSION['character']->health += $boost;
                    $_SESSION['character']->vieActu += $boost;
                }
            }

            if(isset($_SESSION['floors']))
                unset($_SESSION['floors']);
            if(isset($_SESSION['enemies']))
                unset($_SESSION['enemies']);
            if(isset($_SESSION['doors']))
                unset($_SESSION['doors']);
            if(isset($_SESSION['action']))
                unset($_SESSION['action']);
            if(isset($_SESSION['shillings']))
                unset($_SESSION['shillings']);
            if(isset($_SESSION['level']))
                unset($_SESSION['level']);

            header('location: ViewGame');
        }
        if(isset($_SESSION['player'])){
            require __DIR__ . '../../Views/Play/selection.php';
        }
    }

    function ViewGame():void{

        if(isset($_SESSION['action'])){
            if ($_SESSION['action'] == 'combat' || $_SESSION['action'] == 'boss') {
                if($_SESSION['ennemi']->vieActu > 0)
                    header('location: ViewCombat');
            }
        }

        if(isset($_SESSION['character'])){
            if ($_SESSION['character']->vieActu <= 0) {
                header('location: ViewGameOver');
            }
        }

        if(!isset($_SESSION['floors'])){
            if(isset($_SESSION['character'])) {
                $this->startGame();
                require __DIR__ . '../../Views/Play/game.php';
            }
        }
        else{
            if(isset($_SESSION['action'])){
                if($_SESSION['action'] == 'boss'){
                    $_SESSION['level'] += 1;
                    $_SESSION['player']->shillings += 10 * ($_SESSION['level']);
                    $_SESSION['shillings']+= 10 * ($_SESSION['level']);
                    if($_SESSION['level'] >= 5)
                        header('location: ViewWin');
                }
            }
            require __DIR__ . '../../Views/Play/game.php';
        }
    }

    function ViewWin():void{
        if(isset($_SESSION['level'])){
            if($_SESSION['level'] >= 5){
                $repo = new UserRepositorie();
                $repo->saveGame($_SESSION['player']->id,$_SESSION['player']->shillings, BD);
                require __DIR__ . '../../Views/Play/gameWin.php'; //to do {save shillings}
            }
        }
        else
            header('location: ViewSelection');
    }

    function ViewGameOver():void{
        if(isset($_SESSION['character'])){
            if ($_SESSION['character']->vieActu <= 0) {
                $repo = new UserRepositorie();
                $repo->saveGame($_SESSION['player']->id,$_SESSION['player']->shillings, BD);
                require __DIR__ . '../../Views/Play/gameOver.php';
            }
        }
    }

    function startGame():void{
        $doors= Array();
        $floors = Array(Array());

        for ($i = 0; $i < 5; $i++) {
            $floors[$i] = new FloorModel($i);
            $randomBoss = rand(0, 4);
            for ($j = 0; $j < 5; $j++){
                $random = rand(0,10);
                if($j == $randomBoss){
                    $doors[$j] = new DoorModel($j,"boss");
                }
                else if($random >= 3){
                    $doors[$j] = new DoorModel($j,"combat");
                }
                else if($random >= 1){
                    $doors[$j] = new DoorModel($i,"placard");
                }
                else{
                    $doors[$j] = new DoorModel($i,"healing");
                }
            }
            $floors[$i] = $doors;
        }
        $_SESSION['floors'] = $floors;
        $_SESSION['level'] = 0;
        $_SESSION['shillings'] = 0;
    }

    function Doors():void{
        if(isset($_POST['porte'])){
            $door = $_SESSION['floors'][$_SESSION['level']][$_POST['porte']];
            if(!$door->getIsOpen()){
                $action = $door->getAction();
                $door->setIsOpen(true);

                if($action == "boss"){
                    $repo = new GameRepositorie();
                    $ennemi = $repo->getOneBoss(BD);
                    $ennemi->health *= $_SESSION['level']+1;
                    $ennemi->vieActu *= $_SESSION['level']+1;
                    $ennemi->attack *= $_SESSION['level']+1;
                    $ennemi->defense *= $_SESSION['level']+1;
                    $_SESSION['ennemi'] = $ennemi;
                    $_SESSION['action'] = "boss";
                    header('location: ViewCombat');
                }
                else if($action == "combat"){
                    $repo = new GameRepositorie();
                    $ennemi = $repo->getOneMonster(BD);
                    $ennemi->health *= $_SESSION['level']+1;
                    $ennemi->vieActu *= $_SESSION['level']+1;
                    $ennemi->attack *= $_SESSION['level']+1;
                    $ennemi->defense *= $_SESSION['level']+1;
                    $_SESSION['ennemi'] = $ennemi;
                    $_SESSION['action'] = "combat";
                    header('location: ViewCombat');
                }
                else if($action == "placard"){
                    $_SESSION['action'] = "placard";
                    header('location: ViewGame');
                }
                else if($action == "healing"){
                    $_SESSION['action'] = "healing";
                    $_SESSION['character']->vieActu = $_SESSION['character']->health;
                    header('location: ViewGame');
                }
            }
            else{
                $_SESSION['action'] = "PorteDejaOuverte";
                header('location: ViewGame');
            }
        }
    }

    function ViewCombat():void{
        if(isset($_SESSION['ennemi'])){
            if($_SESSION['ennemi']->vieActu > 0){
                require __DIR__ . '../../Views/Play/combat.php';
            }
        }
        else
            header('location: ViewGame');
    }

    function createTable():void{
        $monstre = new GameRepositorie();
        $monstre->createMonsterTable(BD);
    }


    function Disconnect():void{
        session_unset();
        session_destroy();
        header('location: ' . HOME_PATH .'/Home/index');
    }
}