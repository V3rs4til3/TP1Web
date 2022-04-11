<?php

namespace Controllers;

use Models\UserModel;
use Repositories\UserRepositorie;
use Utils\Post;
class UserController
{
    function Connect(){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userRepo = new UserRepositorie();
        $user = $userRepo->getOne(BD, $username);

        if($username != '' && ctype_alnum($username)){
            if ($user) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['player'] = $user;
                    header('location: ' . HOME_PATH .  '/Game/ViewSelection');
                }
                else{
                    $_POST['error'] = 'Mot de passe incorrect';
                }
            }
            else{
                $_POST['error'] = 'Indentifiant incorrect';
            }
        }
        else{
            $_POST['error'] = 'Username incorrect';
        }
    }

    function Create(){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $verifications = $_POST['verifications'];

        $newUser = new UserModel();
        $userRepo = new UserRepositorie();
        $lerror = new Post();

        if(!$userRepo->getOne(BD, $username)){
            if($username != '' &&  strlen($username) >= 1 && strlen($username) <255 && ctype_alnum($username)){
                if($password != '' && strlen($password) >= 7 && strlen($password) < 255){
                    if ($password == $verifications){
                        $securedPassword = password_hash($password, PASSWORD_DEFAULT);

                        $newUser->username = $username;
                        $newUser->password = $securedPassword;

                        $userRepo->newInsert(BD, $newUser);
                        $_POST['success'] = 'Compte cree avec succes';
                        //post user creer pour la page connect
                        header('location: ViewConnect');
                    }
                    else{
                        //passwords pas identique
                        $_POST['error'] = 'vos 2 password ne sont pas identique';
                    }
                }
                else{
                    //password invalide
                    $_POST['error'] = 'Entrer un password d\'au moins 7 cartacteres ';
                }
            }
            else{
                //username invalide
                $_POST['error'] = 'Entrer un username d\'au moins 1 cartacteres sans caractere special';
            }
        }
        else{
           //username already exist
            $_POST['error'] = 'Ce username est deja utilise';
        }
    }

    function createTable(): void{
        $userRepo = new UserRepositorie();
        $userRepo->createTable(BD);
    }

    function ViewConnect():void{
        if(isset($_SESSION['player'])){
            header('location: ' . HOME_PATH . '/Game/ViewSelection');
        }
        else if(isset($_POST['username'])){
            $this->Connect();
        }

        require __DIR__ . '../../Views/Users/connect.php';
    }

    function ViewCreate():void{
        if(isset($_SESSION['player'])){
            header('location: ' . HOME_PATH .'/Game/ViewSelection');
        }
        else if(isset($_POST['username'])){
            $this->Create();
        }

        require __DIR__ . '../../Views/Users/create.php';
    }
}