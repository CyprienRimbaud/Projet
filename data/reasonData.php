<?php

function reasonData_getAll(){
    $request ="SELECT * FROM `reason`";

    $result = Connection::query($request);

    return $result;
}


