<?php

namespace Utils;

class Post
{
    public array $error = array();

    function getError(): array{
       return $_SESSION['error'];
    }
    function setError(string $myError): void{
        $_SESSION['error'] = $myError;
    }
}