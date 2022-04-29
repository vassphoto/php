<pre><?php

//For ciklus
$tomb1 = ['alma', 'körte', 'dió', 'banán', 'citrom'];

$elemszam = count($tomb1);

for( $i =0; $i < $elemszam; $i++ ){
    print '<li>'.$tomb1[$i].'</li>';
}

print '<hr>';


//While ciklus
$tomb2 = ['alma', 'körte', 'dió', 'banán', 'citrom'];

$i = 0;
while( $i < count($tomb2) ){
    print $tomb2[$i]." ";
    $i++;
}

print '<hr>';


//Foreach ciklus
$tomb3 = ['első gyümölcs'=>'alma', 
         'második gyümölcs'=>'körte', 
         'harmadik gyümölcs'=>'dió', 
         'negyedik gyümölcs'=>'banán',
         'ötödik gyümölcs'=>'citrom'        
        ];


foreach( $tomb3 as $kulcs => $ertek ){
    print "$kulcs : $ertek<br>";
}     

print '<hr>';


//Asszociativ tömb ciklussal, tömb elemeinek száma
$user = [
    'nev' => 'Erika',
    'lakhely' => 'Budapest',
    'eletkor' => 25
];

$elemszam = count($user);

print 'tömb elemeinek száma:'.$elemszam. '<br>';

foreach( $user as $elem){
    print '<h1>'.$elem.'</h1>';
}

print '<hr>';

//Indexelt és asszociatív tömb, bárely indexen vagy kulcson lévő érték kiíratása

//Indexelt tömb
$indexelt = ['Álmos', 'Előd', 'Ond', 'Kond', 'Tas'
        ];

echo $indexelt[3];

print '<hr>';

//Asszociatív tömb
$asszociativ = [
    'nev' => 'Béla',
    'lakhely' => 'Szekszárd',
    'eletkor' => 45
];

print ( $asszociativ['lakhely']);

?>