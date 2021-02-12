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
                <td>Demande numéro: <?=$compteur+1?></td>
                <td>Du <?= dateUsToFr($userVacationData[$compteur]['start']) ?> au <?=dateUsToFr($userVacationData[$compteur]['end'])?></td>
                <?php echo vacation_getStatusLabel($userVacationData[$compteur]['status'])?>
                <td><?= vacation_getReasonLabel($userVacationData[$compteur]['label'])?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

