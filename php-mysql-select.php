<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + MySQL</title>
</head>
<body>
<?php

$connection = mysqli_connect( "localhost:3306", "root", "", "gyakorlas2" );

$error = mysqli_error($connection);
mysqli_set_charset($connection, "utf8mb4");

if( $error ){
    echo $error;
}

$keres = mysqli_query($connection, "select * from orszagok order by orszag asc limit 0,20");
while ( $eredmeny = mysqli_fetch_array($keres) ){
    print( $eredmeny["orszag"].'<br>' );
}

// print_r($eredmeny["orszag"]);

?>
</body>
</html>