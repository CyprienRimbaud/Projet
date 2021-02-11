<?php
function vacation_getStatusLabel($statusId)
{

    switch ($statusId){
        case '0':
            return '<td class ="bg-gradient-warning">En attente</td>';
        case '1':
            return '<td class ="bg-gradient-success">Accepté</td>';
        case '2':
            return '<td class ="bg-gradient-danger">Refusé</td>';
        default:
            return '<td class ="bg-gradient-primary">Non renseigné</td>';
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