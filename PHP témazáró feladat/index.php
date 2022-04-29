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

    <title>PHP zárófeladat - Userek listázása</title>
</head>

<body>

    <?php
    // Kapcsolódás adatbázishoz
    $connection = mysqli_connect("localhost:3306", "root", "", "phpfeladat");
    mysqli_set_charset($connection, "utf8mb4");

    // Kapcsolódási hiba ellenőrzése
    $error = mysqli_error($connection);

    if ($error) {
        echo $error;
    }
 
    ?>

    <!-- Táblázat létrehozása Bootstrap-el kezdete -->

        <div class="container">
            <div class="row row-cols-4">
 
            <h2 class="col-12 text-center">Userek listázása</h2>

                <?php
                $sql = "SELECT id, name, email, created_at FROM users";
                $result = $connection->query($sql);
                // Táblázat létrehozása
                if ($result->num_rows > 0) {
                    echo    '<div class="p-2 col border border-dark text-white bg-dark text-center">Név</div>
                            <div class="p-2 col border border-dark text-white bg-dark text-center">E-mail</div>
                            <div class="p-2 col border border-dark text-white bg-dark text-center">Regisztráció dátuma</div>
                            <div class="p-2 col border border-dark text-white bg-dark text-center">Művelet</div>';

                    // Sorok feltöltése tartalommal
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="d-flex flex-column justify-content-center align-items-center border border-dark text-center" name="nev">' . $row["name"] . 
                             '</div><div class="d-flex flex-column justify-content-center align-items-center border border-dark text-center" name="email">' . $row["email"] . 
                             '</div><div class="d-flex flex-column justify-content-center align-items-center border border-dark text-center" name="regisztracio_datuma">' . $row["created_at"] . 
                             '</div><div class="col border border-dark text-center">' . 
                             
                             '<div class="p-2 d-flex justify-content-around">
                             
                             <a class="btn btn-success" href="szerkesztes.php?id=' . $row["id"] . 
                             '"> szerkesztés </a>

                             <a  class="btn btn-danger" href="torles.php?id=' . $row["id"] . 
                             '"> törlés </a>
                             
                             </div>'
                             . '</div>';
                    }
                    echo "</div><br>";
                } else {
                    echo "Nincs találat!";
                }

                ?>

        </div>
        <!-- Táblázat létrehozása Bootstrap-el vége -->

        <!-- Bootstrap javascript meghívása -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
