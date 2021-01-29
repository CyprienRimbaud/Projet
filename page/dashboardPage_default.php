<?php include('template/header.php'); 
include('../page/template/menu.php'); ?>

        <h1>Votre tableau bord</h1>

    <table class="table table-dark table-sm">
        <tr><th>Demandes</th><th>Date</th><th>Etat</th></tr>
        <?php
        $html="";

        for($compteur = 0; $compteur < count($userVacationData);$compteur++){
            $html.= '<tr><td>Demande numéro: '.$userVacationData[$compteur]['id'].'';
            $html.= '<td>'.$userVacationData[$compteur]['start'].'';
            $html.= " au ".$userVacationData[$compteur]['end'].'';
            $html.= '</td>';
            $html.= '<td>'.$userVacationData[$compteur]['status'].'</td>';
        }
        echo $html;
        ?>
    </table>


<?php include('template/footer.php'); ?>
