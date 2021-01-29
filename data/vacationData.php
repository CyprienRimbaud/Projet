<?php

function vacationData_getAllWithId(){
    $request ="SELECT `start`, `end`, `user_id`, `status` FROM `vacation`";
    try {
        $result = Connection::query($request);
    } catch (Exception $e) {
        $result = '';
    }
    return $result;
}