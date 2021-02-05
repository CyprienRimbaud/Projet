<?php
function vacation_getStatusLabel($statusId)
{

    switch ($statusId){
        case '0':
            return 'En attente';
        case '1':
            return 'Accepté';
        case '2':
            return 'Refusé';
        default:
            return 'Non renseigné';
    }

}
function vacation_getReasonLabel($reasonId){
    switch ($reasonId){
        case 'CP':
            return 'Congés annuels';
        case 'CS':
            return 'Congés sans solde';
        case 'CC':
            return 'Congés pour événement familial ';
        case 'AA':
            return 'Absence autorisée';
        case 'RTT':
            return 'Jour de réduction du temps de travail';
        default:
            return 'Non renseigné';
    }
}
?>