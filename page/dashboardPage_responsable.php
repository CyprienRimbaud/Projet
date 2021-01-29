<?php

include('template/header.php');
include('../page/template/menu.php');
?>

<h1 align="center"><u>Tableau de bord des demandes de congés</u></h1>
        <table style="width: 100%">
        <thead>
        <tr>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Prénom/Nom du demandeur</th>
                <th>Status du demandeur</th>
        </tr>
        </thead>
        </table>
<?php
$html = '';
foreach ($vacations as $vacation)
{
        $html.= '<div class="table-wrapper">';
        $html.= '<tr>
                 <td>'.$vacation['start'].'</td>
                 <td>'.$vacation['end'].'</td>
                 <td>'.$vacation['user_id'].'</td>
                 <td>'.$vacation['status'].'</td>
                 </tr>';
}
echo $html;
?>

<?php include('template/footer.php'); ?>