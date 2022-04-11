<?php

namespace controllers;

class HomeController
{
    function index():void {
        if(isset($_SESSION['player'])){
            header('location: ' . HOME_PATH . '/Game/ViewSelection');
        }
        require __DIR__ . '../../Views/Home/index.php';
    }
}