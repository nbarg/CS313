<?php

/* 
 * this will insert a new cat into the vehicle table
 */

require_once 'database.php';
$db = loadDB();
session_start();

$make = filter_input(INPUT_POST, 'make');
$model = filter_input(INPUT_POST, 'model');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

if ($make == false || $model == false || $user_id == false){
    $error = 'Must enter both make and model.';
    include 'vehicleSelection.php';
    exit;
}

$query_insert_vehicle = 'INSERT INTO vehicle (user_id, make, model)
                        VALUES ( :user_id
                               , :make
                               , :model)';
$vehicle_stmt = $db->prepare($query_insert_vehicle);
$vehicle_stmt->bindValue(':user_id', $user_id);
$vehicle_stmt->bindValue(':make', $make);
$vehicle_stmt->bindValue(':model', $model);
$vehicle_stmt->execute();
$vehicle_stmt->closeCursor();

include'vehicleSelection.php';