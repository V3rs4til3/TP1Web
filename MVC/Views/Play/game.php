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

    <h1 class="d-flex justify-content-center">Level : <?= $_SESSION['level'] + 1 ?></h1>

    <?php if(isset($_SESSION['action'])){ ?>
        <?php if($_SESSION['action'] == 'placard') { ?>
            <div class="alert alert-success" role="alert">
                Vous avez trouve un placard !
            </div>
        <?php }
        else if($_SESSION['action'] == 'healing'){?>
            <div class="alert alert-success" role="alert">
                    Vous avez trouve un kit de soin !
            </div>
        <?php }
    }?>

    <form method="post" action="Doors">
        <div class="mt-5 d-flex flex-row container justify-content-around">

        <?php
            for ($i = 0; $i < 5; $i++){
                    if($_SESSION['floors'][$_SESSION['level']][$i]->getIsOpen()){?>
                        <button disabled class="btn btn-lg btn-primary" name="porte" value="<?= $i ?>"> <?= 'Porte ' . $i + 1 ?> </button>
                    <?php }
                    else{?>
                <button type="submit" class="btn btn-lg btn-primary" name="porte" value="<?= $i ?>"> <?= 'Porte ' . $i + 1 ?> </button>
            <?php }
            }
        ?>
        </div>
    </form>
</body>