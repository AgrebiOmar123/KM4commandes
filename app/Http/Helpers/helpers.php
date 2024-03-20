<?php

function format_argent ($nombre) {
    return number_format($nombre, 0, ',', '.');
}

//******************** */

function distinguer ($nombre) {
    $nombre = abs($nombre);
    $chiffre  = array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze');
    $valeur = '';
    

    if ($nombre < 12) { // 0 - 11
        $valeur = ' ' . $chiffre[$nombre];
    } elseif ($nombre < 20) { // 12 - 19
        $valeur = distinguer($nombre -10) . ' douze';
    } elseif ($nombre < 100) { // 20 - 99
        $valeur = distinguer($nombre / 10) . ' dix' . distinguer($nombre % 10);
    } elseif ($nombre < 200) { // 100 - 199
        $valeur = ' seratus' . distinguer($nombre -100);
    } elseif ($nombre < 1000) { // 200 - 999
        $valeur = distinguer($nombre / 100) . ' cent' . distinguer($nombre % 100);
    } elseif ($nombre < 2000) { // 1.000 - 1.999
        $valeur = ' seribu' . distinguer($nombre -1000);
    } elseif ($nombre < 1000000) { // 2.000 - 999.999
        $valeur = distinguer($nombre / 1000) . ' mille' . distinguer($nombre % 1000);
    } elseif ($nombre < 1000000000) { // 1000000 - 999.999.990
        $valeur = distinguer($nombre / 1000000) . ' million' . distinguer($nombre % 1000000);
    }

    return $valeur;
}