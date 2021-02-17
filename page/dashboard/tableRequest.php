<table class="table table-light table-striped">
    <thead>
        <tr>
            <th>Demandes</th>
            <th>Date</th>
            <th>Etat</th>
            <th>Raisons</th>
            <th>Commentaire</th>
            <th>Supprimer</th>
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
                <td><?= $userVacationData[$compteur]['comentary']?></td>
                <td><a href="?route=dashboard&action=cancel&id=<?php echo $userVacationData[$compteur]['vacation_id'] ?>" class="nav-link"> <i class="nav-icon fas fa-trash"></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


trash



