
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

            <div class="col-md-2 text-end">
                <a class="btn btn-primary" href="<?= HOME_PATH ?>/User/ViewConnect" role="button">Connexion</a>
                <a class="btn btn-primary" href="<?= HOME_PATH ?>/User/ViewCreate" role="button">Creer</a>
            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>

<body>
<div class="container">
    <form method="post">

        <?php if(isset($_POST['error'])){  ?>
            <div class="alert alert-danger" role="alert">
            <?= $_POST['error'] ?>
        </div>
        <?php } ?>

        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username"/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (7 caracteres minimum)</label>
            <input type="password" class="form-control" name="password" id="password"/>
        </div>
        <div class="mb-3">
            <label for="secondPassword" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" name="verifications" id="verifications"/>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Créer son compte</button>
        </div>
    </form>
</div>
</body>
