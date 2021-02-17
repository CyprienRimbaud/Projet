<?php

function vacationData_getVacationById($userid){
    $request ='SELECT vacation.*,vacation.id AS vacation_id, user.lastname, user.firstname,user.id, reason.label FROM `vacation` JOIN user ON user_id = user.id JOIN reason ON reason_id = reason.id WHERE user_id ="'.$userid .'"ORDER BY vacation.id DESC';
    try {
        $result = Connection::query($request);
    } catch (Exception $e) {
        $result = '';
    }
    return $result;
}

//function vacationData_getAllWithId($userId){
//
//    $request ='SELECT vacation.id, vacation.start, vacation.end, vacation.status,reason.label FROM `vacation` JOIN `reason` ON  reason.id = vacation.reason_id WHERE user_id ="'.$userId.'"ORDER BY vacation.start';
//    $result = Connection::query($request);
//    return $result;
//}

function vacationData_insertVacationById($dateStart,$dateEnd,$type,$comments)
{

    $request = 'INSERT INTO `vacation` (`id`, `start`, `end`, `user_id`, `status`, `reason_id`,`comentary`) VALUES (NULL,"'."$dateStart".'","'."$dateEnd".'","'.$_SESSION['id'].'",0,"'.$type.'","'.$comments.'")';

    Connection::exec($request);

}

function vacationData_changeStatusById($userId,$newStatus,$idVacation){
    $request ='UPDATE `vacation` SET `status` = "'.$newStatus.'" WHERE `vacation`.`id` = "'.$idVacation.'" AND user_id = "'.$userId.'"';

    Connection::exec($request);
}

function vacationData_getVacationByIdAndMonth($userid,$month){
    $request ='SELECT vacation.*,vacation.id AS vacation_id, user.lastname, user.firstname,user.id, reason.label FROM `vacation` JOIN user ON user_id = user.id JOIN reason ON reason_id = reason.id WHERE user_id ="'.$userid .'" AND MONTH(start) ="'."$month".'"ORDER BY vacation.start';
    try {
        $result = Connection::query($request);
    } catch (Exception $e) {
        $result = '';
    }
    return $result;
}

function vacationData_deleteVacationWithVacationId($vacationId){
    $request = 'DELETE FROM `vacation` WHERE `vacation`.`id` ='.$vacationId;
    Connection::exec($request);
}