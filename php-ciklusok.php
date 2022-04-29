<?php

$tomb = ['első gyümölcs'=>'alma', 
         'második gyümölcs'=>'körte', 
         'harmadik gyümölcs'=>'dió', 
         'negyedik gyümölcs'=>'barack'];


foreach( $tomb as $kulcs => $ertek ){
    print "$kulcs : $ertek<br>";
}         

// $elemszam = count($tomb);

// for( $i =0; $i < $elemszam; $i++ ){
//     print '<li>'.$tomb[$i].'</li>';
// }

// foreach( $tomb as $elem){
//     print '<h1>'.$elem.'</h1>';
// }

// $i = 0;
// while( $i < count($tomb) ){
//     //folyamat
//     print $tomb[$i]." ";
//     $i++;
// }

?>