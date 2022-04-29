<?php

session_start();

if( isset($_SESSION[ "logged_in" ]) && $_SESSION[ "logged_in" ] === true ){
    echo 'Ön be van lépve!';
}
else {
    echo 'Ön nincs belépve!';
}
?>