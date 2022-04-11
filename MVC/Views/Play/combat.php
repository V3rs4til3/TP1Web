<?php
var_dump($_SESSION['ennemi']);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
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

<p><?= $_SESSION['character']->nom ?></p>
<p>Attaque : <?= $_SESSION['character']->attack ?></p>
<p>Defense : <?= $_SESSION['character']->defense ?></p>
<p id="playerHP">Vie : <?= $_SESSION['character']->health ?></p>


<p><?= $_SESSION['ennemi']->nom ?></p>
<p>Attaque : <?= $_SESSION['ennemi']->attack ?></p>
<p>Defense : <?= $_SESSION['ennemi']->defense ?></p>
<p id="enemiHP">Vie: <?= $_SESSION['ennemi']->health ?></p>

<button type="button" class="btn btn-primary" id="attack">Attaquer</button>
<button type="button" class="btn btn-warning" id="special">Attaque Speciale</button>

<div id="log"></div>

<form action="<?= HOME_PATH ?>/Game/ViewGame" method="post">
    <div id="quit"></div>
</form>

<script src="<?=HOME_PATH?>/Assets/js/api.js"></script>
</body>