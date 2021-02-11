<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Demandes</th>
            <th>Date</th>
            <th>Etat</th>
            <th>Raisons</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($compteur = 0; $compteur < count($userVacationData);$compteur++){
        ?>
            <tr>
                <td>Demande numéro: <?=$userVacationData[$compteur]['id']?></td>
                <td>Du <?= $userVacationData[$compteur]['start'] ?> au <?=$userVacationData[$compteur]['end']?></td>
                <td><?= vacation_getStatusLabel($userVacationData[$compteur]['status'])?></td>
                <td><?= vacation_getReasonLabel($userVacationData[$compteur]['label'])?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

