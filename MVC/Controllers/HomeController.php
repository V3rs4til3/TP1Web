<?php

namespace controllers;

class HomeController
{
    function index():void {
        if(isset($_SESSION['player'])){
            header('location: /MVC/Game/ViewSelection');
        }
        require __DIR__ . '../../Views/Home/index.php';
    }
}