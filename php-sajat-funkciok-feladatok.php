<?php

// function koszon($nev){
//     return 'Szia '.$nev.'!<br>';
// }

// print koszon('Péter');


//Feladat 1 - szám négyzetre emelése
function negyzetre_emeles($szam){
    return $szam * $szam;
}

print negyzetre_emeles(5);

print '<hr>';

//Feladat 2 - egy számot megszorzunk 3,14-el
function szorzas($szam, $pi=3.14){
    return $szam * $pi;
}

print szorzas(8);

print '<hr>';

//Feladat 3 - számítsuk ki egy adott kör sugarát
function kor_terulete($szam, $r=3.14){
    return ($szam * $szam) * $r;
}

print kor_terulete(15);

print '<hr>';

//Feladat 4 - km mérfölddé alakítása
function tavolsag($km, $merfold=0.621){
    return $km .' km = ' .$km * $merfold. ' mérföld' ;
}

print tavolsag(99564); 

print '<hr>';

//Feladat 5 - indexelt tömb páratlan indexszámú elemének eltávolítása és visszaadása

// function paros_paratlan( $tomb ):array{

//     $newtomb = [];

//     for ( $i = 0; $i < count ( $tomb ); $i++ ){

//         if( $i % 2 == 1 ){
//             print "$i \n";
//             // páratlan index
//             $newtomb[] = $tomb[$i];
//             // páratlan számúak törlése
//             unset( $tomb[$i] );
//         }
//     }

//     print_r( $tomb );

//     return $newtomb;
// }

// $eredmeny = paros_paratlan( ['alma', 'körte', 'barack', 'dió', 'cseresznye'] );

// print_r( $eredmeny );

function paros_paratlan( $tomb ):void{

    $newtomb = [];

    foreach ( $tomb as $i => $ertek ){

        if( $i % 2 === 1 ){
            print "$i \n";
            // páratlan index
            $newtomb[$i] = $ertek;
            // páratlan számúak törlése
            unset( $tomb[$i] );
        }
    }

    print_r( $tomb );

    print_r( $newtomb );
}

paros_paratlan( ['alma', 'körte', 'barack', 'dió', 'cseresznye'] );

?>
