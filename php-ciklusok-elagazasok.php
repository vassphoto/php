<?php

// $allitas = 100 < 10;

// if( $allitas === true ){
//     print '100 < 10';
// }
// elseif( $allitas === false ){
//     print '100 nem kisebb, mint 10';
// }

// $szam = 1;
// if( $szam === 1 )
// {
//     print "a szám = 1-el";
// }
// elseif( $szam === 2 )
// {
//     print "a szám = 2-vel";
// }
// elseif( $szam === 3 )
// {
//     print "a szám = 3-mal";
// }
// else 
// {
//     print "egyik eset sem igaz";
// }

$szam = 3;

switch( $szam ){

    case 1:
            print '1';
        break;

        case 2:
            print '2';
        break;    

default:
            print 'Egyik eset sem volt igaz!';
break;
    }


?>