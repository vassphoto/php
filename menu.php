<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="account-kezeles.php">Account kezelés</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <?php if (isset($_SESSION["user"]) == false) { ?>
                        <a class="nav-link active" aria-current="page" href="account-kezeles.php">Regisztráció</a>
                        <a class="nav-link" href="login.php">Belépés</a>
                    <?php } else { ?>
                        <a class="nav-link" href="profile.php">Profilom</a>
                        <a class="nav-link" href="logout.php">Kilépés</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>