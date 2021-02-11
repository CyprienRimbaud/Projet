<?php

function vacationData_getVacation(){
    $request ="SELECT `start`, `end`, `user_id`, `status` FROM `vacation`";
    try {
        $result = Connection::query($request);
    } catch (Exception $e) {
        $result = '';
    }
    return $result;
}

function vacationData_getAllWithId($userId){

    $request ='SELECT vacation.id, vacation.start, vacation.end, vacation.status,reason.label FROM `vacation` JOIN `reason` ON  reason.id = vacation.reason_id WHERE user_id ='.$userId;
    $result = Connection::query($request);
    return $result;
}

function vacationData_insertVacationById($dateStart,$dateEnd,$type)
{

    $request = 'INSERT INTO `vacation` (`id`, `start`, `end`, `user_id`, `status`, `reason_id`) VALUES (NULL,"'."$dateStart".'","'."$dateEnd".'","'.$_SESSION['id'].'",0,"'.$type.'")';

    Connection::exec($request);

}


