<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + MySQL INSERT</title>
</head>
<body>
<?php

$connection = mysqli_connect( "localhost:3306", "root", "", "gyakorlas2" );

$error = mysqli_error($connection);
mysqli_set_charset($connection, "utf8mb4");

if( $error ){
    echo $error;
}

$post = $_POST;

if( isset($post["elkuldve"]) ){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $about_me = $_POST["about_me"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $nr = $_POST["nr"];

    mysqli_query($connection, " insert into users 
    (first_name, last_name, about_me, email, password, zip, city, street, nr) 
    values ('$first_name', '$last_name', '$about_me', '$email', '$password', '$zip', '$city', '$street', '$nr')
    ");
    $error = mysqli_error($connection);

    if( $error ){
        echo $error;
    } else {
        echo '<p>Sikeres regisztráció!</p>';
    }
}

?>

<form action="" method="post">

    <input type="text" name="first_name" placeholder="Add meg a vezetékneved">
    <br>
    <input type="text" name="last_name" placeholder="Add meg a keresztneved">
    <br>
    <textarea name="about_me" cols="30" rows="10" placeholder="Írj magadról valamit ..."></textarea>
    <br>
    <input type="text" name="email" placeholder="Add meg az emailcímed">
    <br>
    <input type="password" name="password" placeholder="Add meg a jelszavad">
    <br>
    <input type="text" name="zip" placeholder="Add meg az irányítószámod">
    <br>
    <input type="text" name="city" placeholder="Add meg a várost">
    <br>
    <input type="text" name="street" placeholder="Add meg az utcát">
    <br>
    <input type="text" name="nr" placeholder="Add meg a házszámot">
    <br>
    <button type="submit" name="elkuldve">Küldés</button>

</form>

</body>
</html>