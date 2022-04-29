<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Account kezelés példa - Belépés oldal</title>
</head>

<body>
    <?php
        include("menu.php");
    ?>

    <div class="container pt-5">
        <div class="row">

            <?php if (isset($_POST["submitted"])) {

                $connection = mysqli_connect("localhost:3306", "root", "", "gyakorlas2");
                mysqli_set_charset($connection, "utf8mb4");

                $errors = [];

                if (empty($_POST["email"])) {
                    $errors[] = 'Az e-mail cím kötelező!';
                }

                if (empty($_POST["password"])) {
                    $errors[] = 'A jelszó kötelező!';
                }

                if (count($errors) > 0) {
                    echo '<div class="alert alert-danger col-md-8 col-lg-6 mx auto" role="alert">';
                    foreach ($errors as $error) {
                        echo "$error <br>";
                    }
                    echo '</div>';
                } else {
                    //
                    $sql = mysqli_query($connection, " select * from users where email ='" . $_POST["email"] . "' ");
                    $user = mysqli_fetch_array($sql);

                    if (isset($user["email"]) == false) {
                        $errors[] = 'Nincs találat!';
                    } else {
                        if ($user["password"] != $_POST["password"]) {
                            $errors[] = 'Hibás jelszó!';
                        }
                    }

                    if (count($errors) > 0) {
                        echo '<div class="alert alert-danger col-md-8 col-lg-6 mx auto" role="alert">';
                        foreach ($errors as $error) {
                            echo "$error <br>";
                        }
                        echo '</div>';
                    } else {
                        $_SESSION["user"] = $user;
                        header("location: profile.php");
                    }
                }
            }

            ?>

            <h2 class="col-12 text-center">Belépés</h2>

            <div class="col-md-6 col-lg-4 mx auto">
                <!--   -->
                <form class="row g-3" action="" method="post">

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="col-12 text-center pt-3">
                        <button type="submit" name="submitted" class="btn btn-success">Belépés</button>
                    </div>
                </form>
                <!--   -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>