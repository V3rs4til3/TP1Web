<?php

namespace controllers;

class ApiController
{
    function attack():void{
        http_response_code(200);

        $monAttaque = $_SESSION['character']->sessionAttack($_SESSION['ennemi']);

        $sonAttaque = $_SESSION['ennemi']->sessionAttack($_SESSION['character']);

        if($_SESSION['character']->vieActu > 0)
            $_SESSION['character']->passive();

        echo json_encode([$_SESSION['character']->vieActu, $monAttaque, $_SESSION['ennemi']->vieActu, $sonAttaque]);
    }

    function specialAttack():void{
        http_response_code(200);

        $monAttaque = $_SESSION['character']->specialAttack($_SESSION['ennemi']);

        $sonAttaque = $_SESSION['ennemi']->sessionAttack($_SESSION['character']);

        if($_SESSION['character']->vieActu > 0)
            $_SESSION['character']->passive();

        echo json_encode([$_SESSION['character']->vieActu, $monAttaque, $_SESSION['ennemi']->vieActu, $sonAttaque]);
    }
}