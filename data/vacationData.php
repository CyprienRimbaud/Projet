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

function vacationData_getAllWithIdNotTrash($userId){

    $request ='SELECT * FROM `vacation` WHERE user_id="'.$userId.'" AND trashed = 0';
    $result = Connection::query($request);
    return $result;
}

function vacationData_getAllWithIdTrash($userId)
{
$request ='SELECT * FROM `vacation` WHERE user_id="'.$userId.'" AND trashed = 1';
    $result = Connection::query($request);
    return $result;
}