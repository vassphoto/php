<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Account kezelés példa - Főoldal</title>
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
                $length = strlen($_POST["name"]);

                if ($length < 2 ||  $length > 30) {
                    $errors[] = 'A név minimum 2 maximum 30 karakter lehet!';
                }

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
                    $errors[] = 'Az emailcím invalid!';
                }

                $length = strlen($_POST["password"]);

                if ($length < 4 ||  $length > 20) {
                    $errors[] = 'A jelszó minimum 4 maximum 20 karakter lehet!';
                }

                if ($_POST["password"] != $_POST["password_confirmation"]) {
                    $errors[] = 'A két jelszó nem azonos!';
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
                    //insert
                    mysqli_query($connection, "insert into users (name, email, password, street, nr, city, zip)
                    values
                            ('" . $_POST["name"] . "', 
                            '" . $_POST["email"] . "', 
                            '" . $_POST["password"] . "', 
                            '" . $_POST["street"] . "', 
                            '" . $_POST["nr"] . "', 
                            '" . $_POST["city"] . "', 
                            '" . $_POST["zip"] . "' 
                            ) ");

                    echo '<div class="alert alert-success col-md-8 col-lg-6 mx auto" role="alert">
                    Sikeres regisztráció!
                  </div>';
                }
            }

            ?>

            <h2 class="col-12 text-center">Regisztráció</h2>

            <div class="col-md-8 col-lg-6 mx auto">
                <!--   -->
                <form class="row g-3" action="" method="post">

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Név</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Jelszó</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <div class="col-8">
                        <label for="street" class="form-label">Utca</label>
                        <input type="text" class="form-control" id="street" placeholder="" name="street">
                    </div>
                    <div class="col-4">
                        <label for="nr" class="form-label">Házszám</label>
                        <input type="text" class="form-control" id="nr" placeholder="" name="nr">
                    </div>
                    <div class="col-md-8">
                        <label for="city" class="form-label">Város</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="col-md-4">
                        <label for="zip" class="form-label">Irányítószám</label>
                        <input type="text" class="form-control" id="zip" name="zip">
                    </div>

                    <div class="col-12 text-center pt-3">
                        <button type="submit" name="submitted" class="btn btn-success">Regisztráció</button>
                    </div>
                </form>
                <!--   -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>