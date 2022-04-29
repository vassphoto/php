<!-- Készítsünk egy űrlapot, egyetlen beviteli mezővel. Az űrlapba legyen lehetőség megadni a látogatónak a saját nevét.

Tároljuk el a megadott nevet cookie- ba, amely 1 hétig emlékszik a látogató nevére, aki, ha ezen időn belül újra látogatja az oldalt, üdvözölje a nevén a látogatót!

Tároljuk el ezúttal a megadott nevet session- be. Ha a látogató a session lejáratának idején belül újra látogatja az oldalt, üdvözölje a nevén a látogatót!

Semmisítsük meg a cookie alapú adattárolás esetén cookie-t, ha a látogató az "elfelejt" gombra kattint!

Semmisítsük meg a session alapú adattárolás esetén a session-t, ha a látogató az "elfelejt" gombra kattint! -->

<?php 

session_start();

setcookie('nev', '$nev', ( time() + (60*60*24*7) ) );

$_SESSION["nev"] = '$nev';

$adatok = $_POST;

extract($adatok);

// if( isset($_COOKIE[ "nev" ]) ){
//     echo 'Üdvözlöm kedves '.$nev.'!';
// }
// else {
//     echo 'Kérem adja meg a nevét!';
// }

if( isset($_SESSION[ "nev" ]) ){
    echo 'Üdvözlöm kedves '.$nev.'!';
}
else {
    echo 'Kérem adja meg a nevét!';
}


// //Cookie megsemmisítése elfelejt gombra kattintás esetén
// if( isset( $elfelejt ) ){
//     unset( $_COOKIE[ "nev" ] );
// }

//Session megsemmisítése elfelejt gombra kattintás esetén
if( isset( $elfelejt ) ){
    session_destroy();
}

?>

<form action="" method="post">
    <br>
    <input type="text" name="nev" placeholder="Az Ön neve">
    <br>
    <br>
    <button type="submit" name="elkuld">Eltárol</button>
    <button type="submit" name="elfelejt">Elfelejt</button>
</form>

