<!-- Készítsünk egy űrlapot, egyetlen beviteli mezővel. Az űrlap egy valuta konverter, 
ami a napi árfolyam szerint képes kiszámolni hogy a megadott mennyiségű € hány Ft -nak felel meg. 
Az € napi árfolyamát itt találja. Ne feledje el feltüntetni, hogy milyen árfolyamon kalkulál a program. 

Alakítsuk át a fenti űrlapot úgy, hogy ellenőrízze hogy a felhasználó szám adatot adott-e meg és hogy 0-nál nagyobb számot adott-e meg. 
Nem megfelelő adatok bevitele esetén adjon vissza hibaüzenetet!

Készítsük el a fenti ürlapot POST és GET metódussal is.

A célunk az lenne, hogy a kalkuláció adatai és annak eredménye megosztható legyen másokkal 
(pl. linkben küldött hivatkozással, de ügyeljen arra, hogy az ilyen módon megosztott eredmény, 
csak akkor lesz értelmes, ha az űrlapban a kalkuláció eredménye mellett, a megadott € érték is benne marad)! 
Készítse el ilyen szempontoknak megfelelően a kalkulátort. Fontolja meg, hogy a POST, vagy inkább a GET verzió lenne-e megfelelő.
-->

<?php

$arfolyam = 371.09;

    $adatok = $_GET;

    extract($adatok);

if( isset( $atvaltva ) ){

$euro = $euro;

//hibakezelés

if ( empty( $euro ) || !is_numeric( $euro ) || $euro <= 0 ){
    echo " Az összegnek 0- nál nagyobb számnak kell lennie!";
    echo "<br>";
}
else {
    //kalkuláció
    $osszeg = $euro * $arfolyam;
    echo "Az általad beváltani kívánt ".$euro." euróért ".$osszeg."Ft-ot tudunk adni.";
}

} // endif post atvaltva

else {
    //Érték bekérése
    echo "Kérlek add meg az általad beváltani kívánt összeget!";
}

?>

<h3>Egy &euro; = <?php echo $arfolyam; ?> </h3>

<form action="" method="get">
    <br>
    <input type="text" name="euro" value="<?php echo $euro ??'';?>" placeholder="Hány eurót szeretnél átváltani? ">
    <br>
    <br>
    <button type="submit" name="atvaltva">Átváltom</button>
</form>

