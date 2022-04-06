<?php

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="<?= HOME_PATH ?>/Home/index" >ShrekAttack</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-1 text-end">
                <a class="btn btn-primary" href="<?= HOME_PATH ?>/Game/Disconnect" role="button">Logout</a>
            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>

<body>
<a> <?= $_SESSION['player']->username ?> </a>
<form method="post">
    <div class="col-md-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="class" value="shrek" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Shrek
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="class" value="donkey" >
            <label class="form-check-label" for="flexRadioDefault2">
                Donkey
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="class" value="cookie" >
            <label class="form-check-label" for="flexRadioDefault3">
                Cookie
            </label>
        </div>
    </div>

    <div>
        <p></p>
    </div>

    <div id="imgDiv">
        <img src="/MVC/Assets/Images/shrek.png" width="400px" height="400px">
    </div>

    <a class="btn btn-primary" role="button">Combatre!</a>
</form>





    <script src="/MVC/Assets/js/selection.js"> </script>
</body>