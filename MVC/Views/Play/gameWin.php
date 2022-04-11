
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
    <div class="d-flex justify-content-center">
        <h1>Partie gagné!</h1>
    </div>
    <div class="d-flex justify-content-center">
        <h2>Vous avez gagné <?= $_SESSION['shillings'] ?> shillings</h2>
    </div>
    <div class="d-flex justify-content-center">
        <form action="ViewSelection">
            <button type="submit" class="btn btn-primary">Rejouer</button>
        </form>
    </div>
</body>
