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
        $valeur = ' cent' . distinguer($nombre -100);
    } elseif ($nombre < 1000) { // 200 - 999
        $valeur = distinguer($nombre / 100) . ' cent' . distinguer($nombre % 100);
    } elseif ($nombre < 2000) { // 1.000 - 1.999
        $valeur = ' un millier' . distinguer($nombre -1000);
    } elseif ($nombre < 1000000) { // 2.000 - 999.999
        $valeur = distinguer($nombre / 1000) . ' mille' . distinguer($nombre % 1000);
    } elseif ($nombre < 1000000000) { // 1000000 - 999.999.990
        $valeur = distinguer($nombre / 1000000) . ' million' . distinguer($nombre % 1000000);
    }

    return $valeur;
}

/*************************** */

function format_date($tgl, $jour = true)
{
    $nom_jour  = array(
        'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'
              
    );
    $nom_mois = array(1 =>
        'Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Julliet', 'Aout', 'September', 'October', 'November', 'December'
    );

    $annee   = substr($tgl, 0, 4);
    $mois   = $nom_mois[(int) substr($tgl, 5, 2)];
    $date = substr($tgl, 8, 2);
    $text    = '';

    if ($jour) {
        $ordre_jour = date('w', mktime(0,0,0, substr($tgl, 5, 2), $date, $annee));
        $jour        = $nom_jour[$ordre_jour];
        $text       .= "$jour, $date $mois $annee";
    } else {
        $text       .= "$date $mois $annee";
    }
    
    return $text; 
}


/************************** */

function ajouter_zero_enavant($value, $seuil = null)
{
    return sprintf("%0". $seuil . "s", $value);
}