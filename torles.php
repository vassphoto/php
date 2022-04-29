<?php

    //törlés
    

        // Kapcsolódás adatbázishoz
        $connection = mysqli_connect("localhost:3306", "root", "", "phpfeladat");
        mysqli_set_charset($connection, "utf8mb4");

        $errors = [];

        // Kapcsolódási hiba ellenőrzése
        $error = mysqli_error($connection);

        if ($error) {
            echo $error;
        }

        // Sorok kiválasztása az users táblából
        $query = "DELETE FROM users WHERE id ='".$_GET['id']."' ";
        $torles = mysqli_query($connection, $query);

        if($torles)
        {
            // echo 'Sikeres törlés!';
            header("Location: index.php");
        }else{
            // echo 'Sikertelen törlés!';
            header("Location: index.php");
        }
        mysqli_close($connection);


?>