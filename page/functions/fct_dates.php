<?php

function dates_getAllDate($semaine, $annee, $jour){

        if(strftime("%W",mktime(0,0,0,01,01,$annee))==1)
            $mktime = mktime(0,0,0,01,(01+(($semaine-1)*7)),$annee);
        else
            $mktime = mktime(0,0,0,01,(01+(($semaine)*7)),$annee);

        if(date("w",$mktime) > 1)
            $decalage = ((date("w",$mktime)-1)*60*60*24);

        $lundi = $mktime - $decalage;
        $mardi = $lundi + (1*60*60*24);
        $mercredi = $lundi + (2*60*60*24);
        $jeudi = $lundi + (3*60*60*24);
        $vendredi = $lundi + (4*60*60*24);
        $samedi = $lundi + (5*60*60*24);
        $dimanche = $lundi + (6*60*60*24);

        $resultat = array(date("d/m/Y",$lundi),
            date("d/m/Y",$mardi),
            date("d/m/Y",$mercredi),
            date("d/m/Y",$jeudi),
            date("d/m/Y",$vendredi),
            date("d/m/Y",$samedi),
            date("d/m/Y",$dimanche));

        $jours = array(0, 1, 2, 3, 4, 5, 6);
        if(in_array($jour, $jours))
            return $resultat;
    }
//Fonction permettant la conversion de la date en format Français vers le format US

    function dateFrToUs($formatDataFr){

        $formatDataUs = implode('-',array_reverse  (explode('/',$formatDataFr)));
        return $formatDataUs;

    }

function dateUsToFr($formatDataUs){

    $formatDataFr = implode('/',array_reverse  (explode('-',$formatDataUs)));
    return $formatDataFr;

}
