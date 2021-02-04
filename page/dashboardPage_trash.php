<?php include('template/header.php');
include('../page/template/menu.php'); ?>

        <h1>Votre tableau bord</h1>
    <table class="table table-dark table-sm">
        <tr><th>Demandes</th><th>Date</th></tr>
        <?php
        $html="";
        for($compteur = 0; $compteur < count($userVacationTrash);$compteur++){
            $html.= '<tr><td>Demande numéro: '.$userVacationTrash[$compteur]['id'].'';
            $html.= '<td>'.$userVacationTrash[$compteur]['start'].'';
            $html.= " au ".$userVacationTrash[$compteur]['end'].'';
            $html.= '</td>';

        }
        echo $html;
        $test = dates_getAllDate(1, 2021, 0);
        var_dump($test);

        ?>
    </table>
<p><a href="?route=dashboard"> Revenir au menu principal </a></p>


<?php include('template/footer.php'); ?>


