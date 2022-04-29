<?php

session_start();

if (isset($_SESSION["user"]) == false) {
    exit('Hozzáférés megtagadva!');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Account kezelés példa - Profil oldal</title>
</head>

<body>
    <?php
        include("menu.php");
    ?>

    <div class="container pt-5">
        <div class="row">

            <?php

            $connection = mysqli_connect("localhost:3306", "root", "", "gyakorlas2");
            mysqli_set_charset($connection, "utf8mb4");

            if (isset($_POST["submitted"])) {

                $errors = [];
                $length = strlen($_POST["name"]);

                if ($length < 2 ||  $length > 30) {
                    $errors[] = 'A név minimum 2 maximum 30 karakter lehet!';
                }

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
                    $errors[] = 'Az emailcím invalid!';
                }

                $length = strlen($_POST["street"]);

                if ($length < 2 ||  $length > 30) {
                    $errors[] = 'Az utca minimum 2 maximum 30 karakter lehet!';
                }

                $length = strlen($_POST["nr"]);

                if ($length < 1 ||  $length > 30) {
                    $errors[] = 'A házszám kötelező, és maximum 30 karakter lehet!';
                }

                $length = strlen($_POST["city"]);

                if ($length < 2 ||  $length > 30) {
                    $errors[] = 'A város minimum 2 maximum 30 karakter lehet!';
                }

                $length = strlen($_POST["zip"]);

                if ($length != 4) {
                    $errors[] = 'Az irányítószám 4 karakter hosszú lehet!';
                }

                if (count($errors) > 0) {
                    //hiba
                    echo '<div class="alert alert-danger col-md-8 col-lg-6 mx auto" role="alert">';
                    foreach ($errors as $error) {
                        echo "$error <br>";
                    }
                    echo '</div>';
                } else {
                    //update
                    mysqli_query($connection, "update users set
                                                            name = '" . $_POST["name"] . "', 
                                                            email = '" . $_POST["email"] . "', 
                                                            street = '" . $_POST["street"] . "', 
                                                            nr = '" . $_POST["nr"] . "', 
                                                            city = '" . $_POST["city"] . "', 
                                                            zip = '" . $_POST["zip"] . "' 
                                                            where id = '" . $_SESSION["user"]["id"] . "'
                                                            ");
                    echo mysqli_error($connection);

                    echo '<div class="alert alert-success col-md-8 col-lg-6 mx auto" role="alert">
                    Sikeres adatmódosítás!
                  </div>';
                }
            }

            $sql = mysqli_query($connection, " select * from users where id ='" . $_SESSION["user"]["id"] . "' ");
            $user = mysqli_fetch_array($sql);

            ?>

            <h2 class="col-12 text-center">Profiladataim</h2>

            <div class="col-md-8 col-lg-6 mx auto">
                <!--   -->
                <form class="row g-3" action="" method="post">

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Név</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user["name"] ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user["email"] ?>">
                    </div>

                    <div class=" col-8">
                        <label for="street" class="form-label">Utca</label>
                        <input type="text" class="form-control" id="street" placeholder="" name="street" value="<?php echo $user["street"] ?>">
                    </div>
                    <div class=" col-4">
                        <label for="nr" class="form-label">Házszám</label>
                        <input type="text" class="form-control" id="nr" placeholder="" name="nr" value="<?php echo $user["nr"] ?>">
                    </div>
                    <div class=" col-md-8">
                        <label for="city" class="form-label">Város</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $user["city"] ?>">
                    </div>

                    <div class=" col-md-4">
                        <label for="zip" class="form-label">Irányítószám</label>
                        <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $user["zip"] ?>">
                    </div>

                    <div class=" col-12 text-center pt-3">
                        <button type="submit" name="submitted" class="btn btn-success">Adatmódosítás</button>
                    </div>
                </form>
                <!--   -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>