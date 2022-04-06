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
    <div class="">
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

        <div>
            <p name="attack">Attaque : 5 </p>
            <p name="defense"> Defense : 30 </p>
            <p name="health"> Vie : 40 </p>
            <p name="special"> Attaque special : Regenere 50% de sa vie manquante, ajoute 10% de vie maximum
                (seulement pour cette partie) </p>
            <p name="passive"> Passif : +5 d'attaque a tout les 10% de pv perdu </p>
        </div>

    </div>



    <div id="imgDiv">
        <img src="<?=HOME_PATH?>/Assets/Images/shrek.png" width="400px" height="400px">
    </div>

    <a class="btn btn-primary" role="button">Combatre!</a>
</form>
    <script src="<?=HOME_PATH?>/Assets/js/selection.js"> </script>
</body>