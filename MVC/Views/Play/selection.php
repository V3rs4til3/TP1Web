
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
<div class="d-flex justify-content-around mt-2 flex-row container">
    <p> Bienvenue : <?= $_SESSION['player']->username ?> </p>
    <p> Vous avez : <?= $_SESSION['player']->shillings ?> shillings! Vos stats serons booster de <?= ceil($_SESSION['player']->shillings * 0.1) ?> %</p>
</div>

<div class="d-flex justify-content-around container">
    <form method="post">
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio" value="Shrek" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Shrek
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio" value="Donkey" >
                <label class="form-check-label" for="flexRadioDefault2">
                    Donkey
                </label>
            </div>
        </div>
        <div>
            <p id="attack">Attaque : 20 </p>
            <p id="defense"> Defense : 30 </p>
            <p id="health"> Vie : 50 </p>
            <p id="special"> Attaque special : Regenere 50% de sa vie manquante, ajoute 10% de vie maximum
                    (seulement pour cette partie) </p>
            <p id="passive"> Passif : Regenere 10% de ses points de vies perdus </p>
        </div>

        <div id="imgDiv">
            <img src="<?=HOME_PATH?>/Assets/Images/Shrek.png" width="400px" height="400px">
        </div>

        <button type="submit" class="btn btn-primary">Combatre!</button>
    </form>
</div>



<script src="<?=HOME_PATH?>/Assets/js/selection.js"></script>
</body>