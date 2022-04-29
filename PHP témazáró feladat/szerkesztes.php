<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP zárófeladat - User szerkesztése</title>
</head>

<body>

    <?php
    //include("connect.php");
    // Kapcsolódás adatbázishoz
    $connection = mysqli_connect("localhost:3306", "root", "", "phpfeladat");
    mysqli_set_charset($connection, "utf8mb4");

    $errors = [];



    // Kapcsolódási hiba ellenőrzése
    $error = mysqli_error($connection);

    if ($error) {
        echo $error;
    }

    $adatok = $_GET;
    // $_GET["id"]  ---> $id
    extract($adatok);
    // szerkesztés és törlés gombok





    if (isset($_POST["mentes"])) {

        $length = strlen($_POST["nev"]);
        $name = $_POST['nev'];
        $email = $_POST['email'];

        if (count($errors) === 0 || 1) {
            //update
            mysqli_query($connection, "update users set  
                                                name = '" . $_POST["nev"] . "', 
                                                email = '" . $_POST["email"] . "' 
                                                WHERE id = $id
                                                ");
            echo mysqli_error($connection);

            echo '<div class="alert alert-success col-md-8 col-lg-6 mx-auto" role="alert">
        Sikeres adatmódosítás!
      </div>';
        }
    }

    //szerkesztés
    // Sorok kiválasztása az users táblából
    $sql = "SELECT name, email, created_at FROM  users where id='$id'";
    $result = $connection->query($sql);
    $user = mysqli_fetch_assoc($result);


    ?>

    <!-- Táblázat létrehozása Bootstrap-el kezdete -->

    <div class="container">
        <div class="row">

            <h2 class="col-12 text-center">User szerkesztése</h2>
            <form action="" method="post">
                <?php

                // if($isset($_SESSION['status'])){
                //     echo "<h4>".$_SESSION['status']."</h4>";
                //     unset($_SESSION['status']);
                // }

                echo '<div class="d-flex align-items-center flex-column">';

                // User adatok megjelenítése és szerkesztése
                echo            '<div class="col-3 p-2">
                                <label for="nev" class="form-label">Név</label>
                                <input type="text" class="form-control" id="nev" name="nev" value="' . $user["name"] . '">
                            </div>
                            
                            <div class="col-3 p-2">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"  value="' . $user["email"] . '">
                            </div>

                             <button type="submit" name="mentes" method="get" class="col-3 btn btn-success">Mentés</button>';
                             echo '<br> <a href="index.php">Vissza az userekhez</a>';
                echo '</div>';
                ?>

            </form>
        </div>
    </div>
    <!-- Táblázat létrehozása Bootstrap-el vége -->

    <!-- Bootstrap javascript meghívása -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
