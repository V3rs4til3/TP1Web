<?php
   // require require __DIR__ . '../../Assets/html/header.html';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/MVC/Home/index" >ShrekAttack</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2 text-end">
                <a class="btn btn-primary" href="<?= HOME_PATH ?>/User/ViewConnect" role="button">Connexion</a>
                <a class="btn btn-primary" href="<?= HOME_PATH ?>/User/ViewCreate" role="button">Creer</a>
            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>

<body>
    <!-- Background image -->
    <div
            class="p-4 text-center bg-image"
            style="
                    background-image: url(<?= HOME_PATH . '/Assets/Images/homeBackground.jpg'?> );
                    height: 600px;
                    "
    >
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Bienvenue a mon TP1 web</h1>
                    <h4 class="mb-3">Je n'ai aucun droit sur les images</h4>
                    <a class="btn btn-outline-light btn-lg" href="<?= HOME_PATH ?>/User/ViewConnect" role="button">Connexion</a>
                    <a class="btn btn-outline-light btn-lg" href="<?= HOME_PATH ?>/User/ViewCreate" role="button">Creer</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</body>